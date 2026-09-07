import { Component, inject, signal, OnInit, effect, computed } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { GalleryService } from '../../core/services/gallery.service';
import { SettingService } from '../../core/services/setting.service';
import { GalleryItem } from '../../core/models/gallery.model';
import { LoadingSpinnerComponent } from '../../shared/components/loading-spinner.component';
import { EmptyStateComponent } from '../../shared/components/empty-state.component';
import { LightboxModalComponent } from '../../shared/components/lightbox-modal.component';

export interface CategoryFilter {
  key: string;
  nameEn: string;
  nameMr: string;
  icon: string;
}

@Component({
  selector: 'app-gallery',
  standalone: true,
  imports: [CommonModule, RouterModule, LoadingSpinnerComponent, EmptyStateComponent, LightboxModalComponent],
  templateUrl: './gallery.component.html'
})
export class GalleryComponent implements OnInit {
  langService = inject(LanguageService);
  private galleryService = inject(GalleryService);
  private settingService = inject(SettingService);

  gallery = signal<GalleryItem[]>([]);
  settings = signal<any | null>(null);
  loading = signal(true);
  selectedCategory = signal<string>('all');

  lightboxOpen = signal(false);
  activePhotoUrl = signal('');
  activePhotoTitle = signal('');
  activePhotoCategory = signal('');
  activePhotoIndex = signal(0);

  /**
   * Known metadata dictionary for standard categories, icons, and bilingual translations.
   */
  private readonly categoryMetadata: Record<string, { nameEn: string; nameMr: string; icon: string; order: number }> = {
    'Farm & Nature': { nameEn: 'Farm & Nature', nameMr: 'शेती व निसर्ग', icon: '🌿', order: 1 },
    'Activities': { nameEn: 'Activities', nameMr: 'उपक्रम', icon: '🏊‍♂️', order: 2 },
    'Food & Dining': { nameEn: 'Food & Dining', nameMr: 'खाद्यसंस्कृती', icon: '🍲', order: 3 },
    'Events': { nameEn: 'Events', nameMr: 'सोहळे व कार्यक्रम', icon: '🎉', order: 4 },
    'Guest Moments': { nameEn: 'Guest Moments', nameMr: 'पाहुण्यांचे क्षण', icon: '👨‍👩‍👦', order: 5 },
    'Selfie Points': { nameEn: 'Selfie Points', nameMr: 'फोटो पॉईंट्स', icon: '📸', order: 6 },
    'Heritage & Culture': { nameEn: 'Heritage & Culture', nameMr: 'ऐतिहासिक वारसा', icon: '🚩', order: 7 },
    'Spiritual Attraction': { nameEn: 'Spiritual Attraction', nameMr: 'धार्मिक स्थळ', icon: '🛕', order: 8 },
  };

  /**
   * Normalize an image's category attributes to a canonical category key.
   */
  normalizeCategoryKey(item: GalleryItem): string {
    const en = (item.category_en || '').trim();
    const mr = (item.category_mr || '').trim();
    const cat = (item.category || '').trim();

    if (en === 'Farm & Nature' || mr === 'शेती व निसर्ग' || en.toLowerCase().includes('farm') || mr.includes('शेती') || cat.toLowerCase().includes('farm') || cat.includes('शेती')) {
      return 'Farm & Nature';
    }
    if (en === 'Activities' || mr === 'उपक्रम' || en.toLowerCase().includes('activit') || mr.includes('उपक्रम') || cat.toLowerCase().includes('activit') || cat.includes('उपक्रम')) {
      return 'Activities';
    }
    if (en === 'Food & Dining' || en === 'Food' || mr === 'खाद्यसंस्कृती' || en.toLowerCase().includes('food') || en.toLowerCase().includes('dining') || mr.includes('खाद्य') || cat.toLowerCase().includes('food') || cat.includes('खाद्य')) {
      return 'Food & Dining';
    }
    if (en === 'Events' || mr === 'सोहळे व कार्यक्रम' || en.toLowerCase().includes('event') || mr.includes('सोहळे') || mr.includes('कार्यक्रम') || cat.toLowerCase().includes('event') || cat.includes('सोहळे') || cat.includes('कार्यक्रम')) {
      return 'Events';
    }
    if (en === 'Guest Moments' || mr === 'पाहुण्यांचे क्षण' || en.toLowerCase().includes('guest') || mr.includes('पाहुण्यांचे') || mr.includes('क्षण') || cat.toLowerCase().includes('guest') || cat.includes('पाहुण्यांचे') || cat.includes('क्षण')) {
      return 'Guest Moments';
    }
    if (en.toLowerCase().includes('selfie') || mr.includes('फोटो पॉईंट') || cat.toLowerCase().includes('selfie') || cat.includes('फोटो पॉईंट')) {
      return 'Selfie Points';
    }
    if (en.toLowerCase().includes('heritage') || mr.includes('वारसा') || mr.includes('ऐतिहासिक') || cat.toLowerCase().includes('heritage') || cat.includes('वारसा')) {
      return 'Heritage & Culture';
    }
    if (en.toLowerCase().includes('spiritual') || mr.includes('धार्मिक') || cat.toLowerCase().includes('spiritual') || cat.includes('धार्मिक')) {
      return 'Spiritual Attraction';
    }

    return en || cat || mr || 'General';
  }

  /**
   * Group all gallery images dynamically by their canonical category key.
   */
  galleryGroups = computed<Map<string, GalleryItem[]>>(() => {
    const map = new Map<string, GalleryItem[]>();
    const all = this.gallery();

    all.forEach(item => {
      const key = this.normalizeCategoryKey(item);
      if (!map.has(key)) {
        map.set(key, []);
      }
      map.get(key)!.push(item);
    });

    return map;
  });

  /**
   * Category Filter chips generated automatically from the database images.
   */
  categoryFilters = computed<CategoryFilter[]>(() => {
    const groups = this.galleryGroups();

    const list: CategoryFilter[] = [
      { key: 'all', nameEn: 'All Photos', nameMr: 'सर्व फोटो', icon: '🖼️' }
    ];

    // Order categories by preferred canonical order, followed by dynamic custom categories
    const foundKeys = Array.from(groups.keys()).sort((a, b) => {
      const orderA = this.categoryMetadata[a]?.order ?? 99;
      const orderB = this.categoryMetadata[b]?.order ?? 99;
      return orderA - orderB;
    });

    foundKeys.forEach(key => {
      if (this.categoryMetadata[key]) {
        list.push({
          key,
          nameEn: this.categoryMetadata[key].nameEn,
          nameMr: this.categoryMetadata[key].nameMr,
          icon: this.categoryMetadata[key].icon
        });
      } else {
        const sample = groups.get(key)?.[0];
        list.push({
          key,
          nameEn: sample?.category_en || key,
          nameMr: sample?.category_mr || sample?.category || key,
          icon: '📷'
        });
      }
    });

    return list;
  });

  /**
   * Filtered images for the active category.
   */
  filteredGallery = computed<GalleryItem[]>(() => {
    const cat = this.selectedCategory();
    if (cat === 'all') {
      return this.gallery();
    }
    return this.galleryGroups().get(cat) || [];
  });

  constructor() {
    effect(() => {
      this.langService.currentLang();
      this.loadGallery();
    });
  }

  ngOnInit() {
    this.loadGallery();
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.settings.set(res.data);
        }
      }
    });
  }

  loadGallery() {
    this.loading.set(true);
    this.galleryService.getGallery().subscribe({
      next: (res) => {
        this.gallery.set(res.success && res.data ? res.data : []);
        this.loading.set(false);
      },
      error: () => this.loading.set(false)
    });
  }

  setCategory(catKey: string) {
    this.selectedCategory.set(catKey);
  }

  getCategoryLabel(filter: CategoryFilter): string {
    return this.langService.isMarathi() ? filter.nameMr : filter.nameEn;
  }

  getCategoryCount(catKey: string): number {
    if (catKey === 'all') return this.gallery().length;
    return this.galleryGroups().get(catKey)?.length || 0;
  }

  getActiveCategoryTitle(): string {
    const cat = this.selectedCategory();
    if (cat === 'all') {
      return this.langService.isMarathi() ? 'सर्व फोटो गॅलरी' : 'All Photos Gallery';
    }
    const filter = this.categoryFilters().find(f => f.key === cat);
    if (filter) {
      return this.getCategoryLabel(filter);
    }
    return cat;
  }

  getActiveCategoryIcon(): string {
    const cat = this.selectedCategory();
    const filter = this.categoryFilters().find(f => f.key === cat);
    return filter?.icon || '📸';
  }

  openLightbox(photo: GalleryItem, index = 0) {
    this.activePhotoIndex.set(index);
    this.activePhotoUrl.set(photo.image);
    this.activePhotoTitle.set(photo.title || '');
    this.activePhotoCategory.set(photo.category || '');
    this.lightboxOpen.set(true);
  }

  prevPhoto() {
    const items = this.filteredGallery();
    if (items.length <= 1) return;
    const nextIdx = (this.activePhotoIndex() - 1 + items.length) % items.length;
    const photo = items[nextIdx];
    this.openLightbox(photo, nextIdx);
  }

  nextPhoto() {
    const items = this.filteredGallery();
    if (items.length <= 1) return;
    const nextIdx = (this.activePhotoIndex() + 1) % items.length;
    const photo = items[nextIdx];
    this.openLightbox(photo, nextIdx);
  }
}
