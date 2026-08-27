import { Component, inject, signal, OnInit, effect, computed } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { GalleryService } from '../../core/services/gallery.service';
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

  gallery = signal<GalleryItem[]>([]);
  loading = signal(true);
  selectedCategory = signal<string>('all');

  lightboxOpen = signal(false);
  activePhotoUrl = signal('');
  activePhotoTitle = signal('');
  activePhotoCategory = signal('');
  activePhotoIndex = signal(0);

  categoryFilters: CategoryFilter[] = [
    { key: 'all', nameEn: 'All Photos', nameMr: 'सर्व फोटो', icon: '🖼️' },
    { key: 'Farm & Nature', nameEn: 'Farm & Nature', nameMr: 'शेती व निसर्ग', icon: '🌿' },
    { key: 'Activities', nameEn: 'Activities', nameMr: 'उपक्रम', icon: '🏊‍♂️' },
    { key: 'Food', nameEn: 'Food & Dining', nameMr: 'खाद्यसंस्कृती', icon: '🍲' },
    { key: 'Events', nameEn: 'Events', nameMr: 'सोहळे व कार्यक्रम', icon: '🎉' },
    { key: 'Guest Moments', nameEn: 'Guest Moments', nameMr: 'पाहुण्यांचे क्षण', icon: '👨‍👩‍👦' },
  ];

  filteredGallery = computed(() => {
    const cat = this.selectedCategory();
    const all = this.gallery();
    if (cat === 'all') {
      return all;
    }
    return all.filter(item => {
      const itemCat = (item.category || item.category_en || item.category_mr || '').toLowerCase();
      const targetCat = cat.toLowerCase();
      if (itemCat === targetCat) return true;
      if (targetCat.includes('farm') && (itemCat.includes('farm') || itemCat.includes('शेती'))) return true;
      if (targetCat.includes('activit') && (itemCat.includes('activit') || itemCat.includes('उपक्रम'))) return true;
      if (targetCat.includes('food') && (itemCat.includes('food') || itemCat.includes('खाद्य'))) return true;
      if (targetCat.includes('event') && (itemCat.includes('event') || itemCat.includes('सोहळे') || itemCat.includes('कार्यक्रम'))) return true;
      if (targetCat.includes('guest') && (itemCat.includes('guest') || itemCat.includes('पाहुण्यांचे') || itemCat.includes('stay') || itemCat.includes('क्षण'))) return true;
      return false;
    });
  });

  constructor() {
    effect(() => {
      this.langService.currentLang();
      this.loadGallery();
    });
  }

  ngOnInit() {
    this.loadGallery();
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
    return this.gallery().filter(item => {
      const itemCat = (item.category || item.category_en || item.category_mr || '').toLowerCase();
      const targetCat = catKey.toLowerCase();
      if (itemCat === targetCat) return true;
      if (targetCat.includes('farm') && (itemCat.includes('farm') || itemCat.includes('शेती'))) return true;
      if (targetCat.includes('activit') && (itemCat.includes('activit') || itemCat.includes('उपक्रम'))) return true;
      if (targetCat.includes('food') && (itemCat.includes('food') || itemCat.includes('खाद्य'))) return true;
      if (targetCat.includes('event') && (itemCat.includes('event') || itemCat.includes('सोहळे') || itemCat.includes('कार्यक्रम'))) return true;
      if (targetCat.includes('guest') && (itemCat.includes('guest') || itemCat.includes('पाहुण्यांचे') || itemCat.includes('stay') || itemCat.includes('क्षण'))) return true;
      return false;
    }).length;
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
