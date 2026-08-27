import { Component, inject, signal, OnInit, effect, Input, computed } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, ActivatedRoute } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { PackageService } from '../../core/services/package.service';
import { SettingService } from '../../core/services/setting.service';
import { Package } from '../../core/models/package.model';
import { SiteSettings } from '../../core/models/setting.model';
import { LoadingSpinnerComponent } from '../../shared/components/loading-spinner.component';
import { EmptyStateComponent } from '../../shared/components/empty-state.component';

@Component({
  selector: 'app-package-details',
  standalone: true,
  imports: [CommonModule, RouterModule, LoadingSpinnerComponent, EmptyStateComponent],
  templateUrl: './package-details.component.html'
})
export class PackageDetailsComponent implements OnInit {
  langService = inject(LanguageService);
  private route = inject(ActivatedRoute);
  private packageService = inject(PackageService);
  private settingService = inject(SettingService);

  @Input() slug = '';
  pkg = signal<Package | null>(null);
  allPackages = signal<Package[]>([]);
  settings = signal<SiteSettings | null>(null);
  loading = signal(true);
  error = signal(false);

  otherPackages = computed(() => {
    const currentSlug = this.slug;
    return this.allPackages().filter(p => p.slug !== currentSlug).slice(0, 3);
  });

  // Clean WhatsApp Number formatting (digits only, e.g. 919876543210)
  formattedWhatsAppNumber = computed(() => {
    const rawPhone = this.settings()?.site?.phone || '+91 98765 43210';
    if (!rawPhone) return '';
    const digits = rawPhone.replace(/\D/g, '');
    if (!digits) return '';
    // If user provided a 10 digit Indian number without 91 country code
    if (digits.length === 10) {
      return `91${digits}`;
    }
    return digits;
  });

  isWhatsAppAvailable = computed(() => {
    return !!this.formattedWhatsAppNumber();
  });

  constructor() {
    effect(() => {
      this.langService.currentLang();
      if (this.slug) {
        this.loadPackageDetails(this.slug);
      }
      this.loadAllPackages();
    });
  }

  ngOnInit() {
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.settings.set(res.data);
        }
      },
      error: () => {}
    });

    this.loadAllPackages();

    this.route.paramMap.subscribe(params => {
      const slugParam = params.get('slug');
      if (slugParam) {
        this.slug = slugParam;
        this.loadPackageDetails(slugParam);
      }
    });
  }

  loadAllPackages() {
    this.packageService.getPackages().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.allPackages.set(res.data);
        }
      },
      error: () => {}
    });
  }

  loadPackageDetails(slug: string) {
    this.loading.set(true);
    this.error.set(false);

    this.packageService.getPackageBySlug(slug).subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.pkg.set(res.data);
        } else {
          this.error.set(true);
        }
        this.loading.set(false);
      },
      error: () => {
        this.error.set(true);
        this.loading.set(false);
      }
    });
  }

  getPackageImage(pkg: Package | null): string {
    if (!pkg) return 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=1200&auto=format&fit=crop&q=80';
    if (pkg.featured_image && pkg.featured_image.trim().length > 0) {
      return pkg.featured_image;
    }
    const title = ((pkg.title || '') + ' ' + (pkg.slug || '')).toLowerCase();
    if (title.includes('day-picnic') || title.includes('डे पिकनिक') || title.includes('picnic')) {
      return 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('family') || title.includes('कौटुंबिक')) {
      return 'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('school') || title.includes('college') || title.includes('शालेय') || title.includes('सहल') || title.includes('trip')) {
      return 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('corporate') || title.includes('outing') || title.includes('कॉर्पोरेट') || title.includes('team')) {
      return 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('group') || title.includes('ग्रुप')) {
      return 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('stay') || title.includes('overnight') || title.includes('मुक्काम') || title.includes('cottage')) {
      return 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=1200&auto=format&fit=crop&q=80';
    }
    return 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=1200&auto=format&fit=crop&q=80';
  }

  getInclusions(): string[] {
    const pkg = this.pkg();
    if (!pkg) return [];
    if (Array.isArray(pkg.inclusions) && pkg.inclusions.length > 0) {
      return pkg.inclusions;
    }
    if (this.langService.isMarathi()) {
      return [
        'सकाळचा नाश्ता व चहा',
        'अमर्यादित चुलीवरचे गावरान जेवण व मिसळ',
        'स्विमिंग पूल व रेन डान्स वापर',
        'द्राक्ष बागा व सेंद्रिय शिवार फेरी',
        'पारंपारिक बैलगाडी सफर व ग्रामीण खेळ'
      ];
    }
    return [
      'Welcome Drinks & Traditional Morning Breakfast',
      'Unlimited Authentic Wood-Fired Maharashtrian Lunch & Misal',
      'Full Access to Swimming Pool & DJ Rain Dance',
      'Guided Grape Vineyard & Organic Farm Tour',
      'Bullock Cart Rides & Traditional Rural Sports'
    ];
  }

  getExclusions(): string[] {
    const pkg = this.pkg();
    if (!pkg) return [];
    if (Array.isArray(pkg.exclusions) && pkg.exclusions.length > 0) {
      return pkg.exclusions;
    }
    if (this.langService.isMarathi()) {
      return [
        'वैयक्तिक खरेदी व नर्सरी रोपे',
        'अतिरीक्त कोल्ड्रिंक्स व बाटलीबंद पेये'
      ];
    }
    return [
      'Personal Nursery Purchases & Souvenirs',
      'Extra Packaged Beverages & Custom Stage Requests'
    ];
  }

  openWhatsAppEnquiry() {
    const currentPkg = this.pkg();
    const phone = this.formattedWhatsAppNumber();
    if (!currentPkg || !phone) return;

    const title = currentPkg.title || 'Tour Package';
    const duration = currentPkg.duration || (this.langService.isMarathi() ? 'संपूर्ण दिवस' : 'Full Day');
    const price = currentPkg.discounted_price ? `₹${currentPkg.discounted_price}` : `₹${currentPkg.price}`;

    let message = '';
    if (this.langService.isMarathi()) {
      message = `नमस्कार, मला "${title}" या पॅकेजबद्दल माहिती हवी आहे. कालावधी: ${duration}. किंमत: ${price}. कृपया उपलब्धता आणि बुकिंगची माहिती पाठवा.`;
    } else {
      message = `Hello, I would like more information about the "${title}" package. Duration: ${duration}. Price: ${price}. Please share availability and booking details.`;
    }

    const encodedMessage = encodeURIComponent(message);
    const whatsappUrl = `https://wa.me/${phone}?text=${encodedMessage}`;
    window.open(whatsappUrl, '_blank', 'noopener,noreferrer');
  }
}