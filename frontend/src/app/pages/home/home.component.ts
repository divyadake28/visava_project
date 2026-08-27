import { Component, inject, signal, OnInit, AfterViewInit, OnDestroy, effect } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { FormBuilder, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { LanguageService } from '../../core/services/language.service';
import { SettingService } from '../../core/services/setting.service';
import { ActivityService } from '../../core/services/activity.service';
import { PackageService } from '../../core/services/package.service';
import { EventService } from '../../core/services/event.service';
import { BlogService } from '../../core/services/blog.service';
import { GalleryService } from '../../core/services/gallery.service';
import { TestimonialService } from '../../core/services/testimonial.service';
import { EnquiryService } from '../../core/services/enquiry.service';
import { Activity } from '../../core/models/activity.model';
import { Package } from '../../core/models/package.model';
import { EventItem } from '../../core/models/event.model';
import { Blog } from '../../core/models/blog.model';
import { GalleryItem } from '../../core/models/gallery.model';
import { Testimonial } from '../../core/models/testimonial.model';
import { SiteSettings } from '../../core/models/setting.model';
import { LoadingSpinnerComponent } from '../../shared/components/loading-spinner.component';
import { EmptyStateComponent } from '../../shared/components/empty-state.component';
import { LightboxModalComponent } from '../../shared/components/lightbox-modal.component';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [
    CommonModule, 
    RouterModule, 
    ReactiveFormsModule,
    LoadingSpinnerComponent, 
    EmptyStateComponent, 
    LightboxModalComponent
  ],
  templateUrl: './home.component.html'
})
export class HomeComponent implements OnInit, AfterViewInit, OnDestroy {
  langService = inject(LanguageService);
  private fb = inject(FormBuilder);
  private settingService = inject(SettingService);
  private activityService = inject(ActivityService);
  private packageService = inject(PackageService);
  private eventService = inject(EventService);
  private blogService = inject(BlogService);
  private galleryService = inject(GalleryService);
  private testimonialService = inject(TestimonialService);
  private enquiryService = inject(EnquiryService);

  settings = signal<SiteSettings | null>(null);

  activities = signal<Activity[]>([]);
  activitiesLoading = signal(true);

  packages = signal<Package[]>([]);
  packagesLoading = signal(true);

  events = signal<EventItem[]>([]);
  eventsLoading = signal(true);

  blogs = signal<Blog[]>([]);
  blogsLoading = signal(true);

  gallery = signal<GalleryItem[]>([]);
  galleryLoading = signal(true);

  testimonials = signal<Testimonial[]>([]);
  testimonialsLoading = signal(true);

  lightboxOpen = signal(false);
  activePhotoUrl = signal('');
  activePhotoTitle = signal('');
  activePhotoCategory = signal('');
  activePhotoIndex = signal(0);

  // Animated Statistic Counters
  countGuests = signal<string>('0');
  countAcres = signal<number>(0);
  countRating = signal<string>('0.0');
  countActivities = signal<number>(0);
  private statsAnimated = false;
  private statsObserver?: IntersectionObserver;

  openFaqId = signal<number | null>(1);

  faqs = [
    { id: 1, qKey: 'faq.q1', aKey: 'faq.a1' },
    { id: 2, qKey: 'faq.q2', aKey: 'faq.a2' },
    { id: 3, qKey: 'faq.q3', aKey: 'faq.a3' },
    { id: 4, qKey: 'faq.q4', aKey: 'faq.a4' },
    { id: 5, qKey: 'faq.q5', aKey: 'faq.a5' },
    { id: 6, qKey: 'faq.q6', aKey: 'faq.a6' },
  ];

  enquiryForm: FormGroup = this.fb.group({
    name: ['', [Validators.required]],
    email: ['', [Validators.required, Validators.email]],
    phone: [''],
    subject: [''],
    message: ['', [Validators.required]]
  });

  isSubmitting = signal(false);
  submitSuccess = signal(false);
  submitError = signal(false);
  submitErrorMessage = signal('');
  formSubmitted = signal(false);

  constructor() {
    effect(() => {
      this.langService.currentLang();
      this.loadAllData();
    });
  }

  ngOnInit() {
    this.loadAllData();
  }

  ngAfterViewInit() {
    this.initStatsObserver();
  }

  ngOnDestroy() {
    if (this.statsObserver) {
      this.statsObserver.disconnect();
    }
  }

  private initStatsObserver() {
    if (typeof window === 'undefined') return;

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reducedMotion) {
      this.countGuests.set('50,000');
      this.countAcres.set(15);
      this.countRating.set('4.9');
      this.countActivities.set(25);
      this.statsAnimated = true;
      return;
    }

    const statsElement = document.getElementById('heroStats');
    if (!statsElement || !('IntersectionObserver' in window)) {
      this.animateCounters();
      return;
    }

    this.statsObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && !this.statsAnimated) {
            this.animateCounters();
            if (this.statsObserver) {
              this.statsObserver.disconnect();
            }
          }
        });
      },
      { threshold: 0.15 }
    );

    this.statsObserver.observe(statsElement);
  }

  private animateCounters() {
    if (this.statsAnimated) return;
    this.statsAnimated = true;

    const duration = 1800; // 1.8 seconds smooth animation
    const startTime = performance.now();
    const easeOutExpo = (x: number): number => (x === 1 ? 1 : 1 - Math.pow(2, -10 * x));

    const step = (currentTime: number) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const eased = easeOutExpo(progress);

      const guestsVal = Math.round(eased * 50000);
      this.countGuests.set(guestsVal.toLocaleString('en-US'));

      const acresVal = Math.round(eased * 15);
      this.countAcres.set(acresVal);

      const ratingVal = (eased * 4.9).toFixed(1);
      this.countRating.set(ratingVal);

      const activitiesVal = Math.round(eased * 25);
      this.countActivities.set(activitiesVal);

      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        this.countGuests.set('50,000');
        this.countAcres.set(15);
        this.countRating.set('4.9');
        this.countActivities.set(25);
      }
    };

    requestAnimationFrame(step);
  }

  loadAllData() {
    // 1. Settings (Hero & Global Data Priority)
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.settings.set(res.data);
        }
      },
      error: (err) => console.error('Failed to load settings', err)
    });

    // 2. High Priority: Activities & Packages (Parallel)
    if (this.activities().length === 0) {
      this.activitiesLoading.set(true);
    }
    this.activityService.getActivities().subscribe({
      next: (res) => {
        this.activities.set(res.data || []);
        this.activitiesLoading.set(false);
      },
      error: () => this.activitiesLoading.set(false)
    });

    if (this.packages().length === 0) {
      this.packagesLoading.set(true);
    }
    this.packageService.getPackages().subscribe({
      next: (res) => {
        this.packages.set(res.data || []);
        this.packagesLoading.set(false);
      },
      error: () => this.packagesLoading.set(false)
    });

    // 3. Medium Priority: Testimonials
    if (this.testimonials().length === 0) {
      this.testimonialsLoading.set(true);
    }
    this.testimonialService.getTestimonials().subscribe({
      next: (res) => {
        this.testimonials.set(res.data || []);
        this.testimonialsLoading.set(false);
      },
      error: () => this.testimonialsLoading.set(false)
    });

    // 4. Secondary / Below-The-Fold: Events & Gallery (Parallel)
    if (this.events().length === 0) {
      this.eventsLoading.set(true);
    }
    this.eventService.getEvents().subscribe({
      next: (res) => {
        this.events.set(res.data || []);
        this.eventsLoading.set(false);
      },
      error: () => this.eventsLoading.set(false)
    });

    if (this.gallery().length === 0) {
      this.galleryLoading.set(true);
    }
    this.galleryService.getGallery().subscribe({
      next: (res) => {
        this.gallery.set(res.data || []);
        this.galleryLoading.set(false);
      },
      error: () => this.galleryLoading.set(false)
    });
  }

  toggleFaq(id: number) {
    this.openFaqId.set(this.openFaqId() === id ? null : id);
  }

  openLightbox(photo: GalleryItem, index = 0) {
    this.activePhotoIndex.set(index);
    this.activePhotoUrl.set(photo.image);
    this.activePhotoTitle.set(photo.title || '');
    this.activePhotoCategory.set(photo.category || '');
    this.lightboxOpen.set(true);
  }

  prevPhoto() {
    const items = this.gallery();
    if (items.length <= 1) return;
    const nextIdx = (this.activePhotoIndex() - 1 + items.length) % items.length;
    const photo = items[nextIdx];
    this.openLightbox(photo, nextIdx);
  }

  nextPhoto() {
    const items = this.gallery();
    if (items.length <= 1) return;
    const nextIdx = (this.activePhotoIndex() + 1) % items.length;
    const photo = items[nextIdx];
    this.openLightbox(photo, nextIdx);
  }

  bookOnWhatsApp(pkg: Package, event: Event) {
    event.stopPropagation();
    event.preventDefault();

    const phone = this.settings()?.site?.phone || '+919876543210';
    const cleanPhone = phone.replace(/[^0-9]/g, '');

    const isMr = this.langService.isMarathi();
    let msg = '';
    if (isMr) {
      msg = `नमस्कार! मी विसावा ॲग्रो टुरिझम – बाबांचा मळा येथील "${pkg.title}" या पॅकेजच्या चौकशी व बुकिंगसाठी संपर्क करत आहे.`;
      if (pkg.duration) msg += `\nकालावधी: ${pkg.duration}`;
      if (pkg.price) msg += `\nकिंमत: ₹${pkg.price}`;
    } else {
      msg = `Hello! I would like to enquire and book the "${pkg.title}" package at Visawa Agro Tourism – Babacha Mala.`;
      if (pkg.duration) msg += `\nDuration: ${pkg.duration}`;
      if (pkg.price) msg += `\nPrice: ₹${pkg.price}`;
    }

    const whatsappUrl = `https://wa.me/${cleanPhone}?text=${encodeURIComponent(msg)}`;
    window.open(whatsappUrl, '_blank');
  }

  enquireActivityOnWhatsApp(act: Activity, event: Event) {
    event.stopPropagation();
    event.preventDefault();

    const phone = this.settings()?.site?.phone || '+919876543210';
    const cleanPhone = phone.replace(/[^0-9]/g, '');

    const isMr = this.langService.isMarathi();
    const msg = isMr
      ? `नमस्कार! मी विसावा ॲग्रो टुरिझम – बाबांचा मळा येथील "${act.title}" या उपक्रमाबद्दल अधिक माहितीसाठी संपर्क करत आहे.`
      : `Hello! I am inquiring about the "${act.title}" activity at Visawa Agro Tourism – Babacha Mala.`;

    const whatsappUrl = `https://wa.me/${cleanPhone}?text=${encodeURIComponent(msg)}`;
    window.open(whatsappUrl, '_blank');
  }

  submitEnquiry() {
    this.formSubmitted.set(true);
    if (this.enquiryForm.invalid) {
      return;
    }

    this.isSubmitting.set(true);
    this.submitError.set(false);

    this.enquiryService.submitEnquiry(this.enquiryForm.value).subscribe({
      next: (res) => {
        this.isSubmitting.set(false);
        if (res.success) {
          this.submitSuccess.set(true);
          this.enquiryForm.reset();
          this.formSubmitted.set(false);
        } else {
          this.submitError.set(true);
          this.submitErrorMessage.set(res.message);
        }
      },
      error: (err) => {
        this.isSubmitting.set(false);
        this.submitError.set(true);
        this.submitErrorMessage.set(err.error?.message || 'Submission failed');
      }
    });
  }

  getActivityImage(act: Activity): string {
    if (act.image && act.image.trim().length > 0) {
      return act.image;
    }
    const title = (act.title || '').toLowerCase();
    if (title.includes('pool') || title.includes('पूल') || title.includes('स्विमिंग') || title.includes('water')) {
      return 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('rain') || title.includes('रेन डान्स') || title.includes('music') || title.includes('गाणी')) {
      return 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('vineyard') || title.includes('द्राक्ष') || title.includes('grape')) {
      return 'https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('misal') || title.includes('मिसळ') || title.includes('जेवण') || title.includes('dining') || title.includes('food')) {
      return 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('cart') || title.includes('बैलगाडी')) {
      return 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('rural') || title.includes('games') || title.includes('खेळ') || title.includes('ग्रामीण')) {
      return 'https://images.unsplash.com/photo-1511882150382-421056c89033?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('kids') || title.includes('children') || title.includes('play') || title.includes('मुलांचा')) {
      return 'https://images.unsplash.com/photo-1533105079780-92b9be482077?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('nature') || title.includes('trail') || title.includes('walk') || title.includes('पायवाट') || title.includes('पक्षी')) {
      return 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('seasonal') || title.includes('farming') || title.includes('हंगामी') || title.includes('कामे') || title.includes('शेती कामे')) {
      return 'https://images.unsplash.com/photo-1592417817098-8f3d69109853?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('farm') || title.includes('शिवार') || title.includes('शेती')) {
      return 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&auto=format&fit=crop&q=80';
    }
    return 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&auto=format&fit=crop&q=80';
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

  getEventImage(evt: EventItem): string {
    if (evt.image && evt.image.trim().length > 0) {
      return evt.image;
    }
    const title = ((evt.title || '') + ' ' + (evt.slug || '')).toLowerCase();
    if (title.includes('birthday') || title.includes('वाढदिवस') || title.includes('party')) {
      return 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('school') || title.includes('शालेय') || title.includes('college') || title.includes('picnic')) {
      return 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('corporate') || title.includes('कॉर्पोरेट') || title.includes('meeting') || title.includes('team')) {
      return 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('family') || title.includes('कौटुंबिक') || title.includes('gathering')) {
      return 'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('wedding') || title.includes('photoshoot') || title.includes('प्री-वेडिंग') || title.includes('कपल')) {
      return 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('cultural') || title.includes('सांस्कृतिक') || title.includes('folk') || title.includes('program')) {
      return 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80';
    }
    return 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&auto=format&fit=crop&q=80';
  }

  getTestimonialName(item: any): string {
    const isEn = this.langService.currentLang() === 'en';
    if (isEn && item?.name_en) return item.name_en;
    if (!isEn && item?.name_mr) return item.name_mr;
    if (isEn && item?.client_name_en) return item.client_name_en;
    if (!isEn && item?.client_name_mr) return item.client_name_mr;

    const rawName = item?.client_name || item?.name || '';
    const match = rawName.match(/^(.*?)\s*\((.*?)\)$/);
    if (match) {
      const mrPart = match[1].trim();
      const enPart = match[2].trim();
      return isEn ? (enPart || mrPart) : (mrPart || enPart);
    }
    return rawName;
  }

  getTestimonialInitials(item: any): string {
    const name = this.getTestimonialName(item).trim();
    if (!name) return 'V';
    const parts = name.split(/\s+/);
    if (parts.length >= 2) {
      return (parts[0].charAt(0) + parts[1].charAt(0)).toUpperCase();
    }
    return name.charAt(0).toUpperCase();
  }

  getTestimonialDesignation(item: any): string {
    const isEn = this.langService.currentLang() === 'en';
    if (isEn && item?.client_designation_en) return item.client_designation_en;
    if (!isEn && item?.client_designation_mr) return item.client_designation_mr;
    if (isEn && item?.designation_en) return item.designation_en;
    if (!isEn && item?.designation_mr) return item.designation_mr;

    const rawDesig = item?.client_designation || item?.designation || '';
    const match = rawDesig.match(/^(.*?)\s*\((.*?)\)$/);
    if (match) {
      const mrPart = match[1].trim();
      const enPart = match[2].trim();
      return isEn ? (enPart || mrPart) : (mrPart || enPart);
    }
    return rawDesig;
  }
}