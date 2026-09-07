import { Component, inject, signal, OnInit, effect } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { PackageService } from '../../core/services/package.service';
import { SettingService } from '../../core/services/setting.service';
import { Package } from '../../core/models/package.model';
import { SiteSettings } from '../../core/models/setting.model';
import { LoadingSpinnerComponent } from '../../shared/components/loading-spinner.component';
import { EmptyStateComponent } from '../../shared/components/empty-state.component';

@Component({
  selector: 'app-packages',
  standalone: true,
  imports: [CommonModule, RouterModule, LoadingSpinnerComponent, EmptyStateComponent],
  templateUrl: './packages.component.html'
})
export class PackagesComponent implements OnInit {
  langService = inject(LanguageService);
  private packageService = inject(PackageService);
  private settingService = inject(SettingService);

  packages = signal<Package[]>([]);
  settings = signal<SiteSettings | null>(null);
  loading = signal(true);

  constructor() {
    effect(() => {
      this.langService.currentLang();
      this.loadPackages();
    });
  }

  ngOnInit() {
    this.loadPackages();
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.settings.set(res.data);
        }
      },
      error: () => {}
    });
  }

  loadPackages() {
    this.loading.set(true);
    this.packageService.getPackages().subscribe({
      next: (res) => {
        this.packages.set(res.success && res.data ? res.data : []);
        this.loading.set(false);
      },
      error: () => this.loading.set(false)
    });
  }

  getPackageImage(pkg: Package): string {
    if (pkg.featured_image && pkg.featured_image.trim().length > 0) {
      return pkg.featured_image;
    }
    const title = ((pkg.title || '') + ' ' + (pkg.slug || '')).toLowerCase();
    if (title.includes('day-picnic') || title.includes('डे पिकनिक') || title.includes('picnic')) {
      return 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('family') || title.includes('कौटुंबिक')) {
      return 'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('school') || title.includes('college') || title.includes('शालेय') || title.includes('सहल') || title.includes('trip')) {
      return 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('corporate') || title.includes('outing') || title.includes('कॉर्पोरेट') || title.includes('team')) {
      return 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('group') || title.includes('ग्रुप')) {
      return 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('stay') || title.includes('overnight') || title.includes('मुक्काम') || title.includes('cottage')) {
      return 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&auto=format&fit=crop&q=80';
    }
    return 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=800&auto=format&fit=crop&q=80';
  }

  bookOnWhatsApp(pkg: Package, event?: Event) {
    if (event) {
      event.preventDefault();
      event.stopPropagation();
    }

    const rawPhone = this.settings()?.site?.phone || '+91 91581 41414';
    const digits = rawPhone ? rawPhone.replace(/\D/g, '') : '';
    const phone = digits.length === 10 ? `91${digits}` : digits;

    if (!phone) {
      alert(this.langService.t('package.whatsappUnavailable'));
      return;
    }

    const title = pkg.title || 'Tour Package';
    const duration = pkg.duration || (this.langService.isMarathi() ? 'संपूर्ण दिवस' : 'Full Day');

    let message = '';
    if (this.langService.isMarathi()) {
      message = `नमस्कार, मला "${title}" या पॅकेजबद्दल माहिती हवी आहे. कालावधी: ${duration}. कृपया उपलब्धता आणि बुकिंगची माहिती पाठवा.`;
    } else {
      message = `Hello, I would like more information about the "${title}" package. Duration: ${duration}. Please share availability and booking details.`;
    }

    const encodedMessage = encodeURIComponent(message);
    const whatsappUrl = `https://wa.me/${phone}?text=${encodedMessage}`;
    window.open(whatsappUrl, '_blank', 'noopener,noreferrer');
  }
}