import { Component, OnInit, inject, signal, effect } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { DiningService } from '../../core/services/dining.service';
import { SettingService } from '../../core/services/setting.service';
import { DiningItem } from '../../core/models/dining.model';
import { SiteSettings } from '../../core/models/setting.model';

@Component({
  selector: 'app-village-flavors',
  standalone: true,
  imports: [CommonModule, RouterModule],
  template: `
    <!-- Hero Banner -->
    <div class="page-hero relative bg-[#0D3B1C] text-white overflow-hidden flex items-center justify-center">
      <div class="absolute inset-0 z-0">
        <img 
          [src]="settings()?.homepage?.hero?.image || '/images/visawa_grand_entrance_hero.jpg'" 
          alt="Visawa Authentic Village Flavors" 
          class="page-hero-img w-full h-full object-cover">
        <div class="absolute inset-0 page-hero-overlay"></div>
      </div>
      <div class="hero-content max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4 w-full">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#0D3B1C]/85 border border-amber-400/40 rounded-full text-xs font-bold text-amber-300 backdrop-blur-md shadow-md">
          <span>🍽️</span>
          <span>{{ langService.t('dining.badge') }}</span>
        </div>
        <h1 class="page-hero-title font-black tracking-tight text-white hero-title-shadow">
          {{ langService.t('dining.title') }}
        </h1>
        <p class="text-sm sm:text-base text-white/95 max-w-2xl mx-auto font-medium hero-desc-shadow">
          {{ langService.t('dining.subtitle') }}
        </p>
      </div>
    </div>

    <!-- Main Content Section (Clean Natural Light Cream Theme) -->
    <div class="pt-8 sm:pt-10 pb-12 sm:pb-16 bg-stone-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 sm:space-y-12">

        <!-- 3 Culinary Feature Highlights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
          <div class="bg-white rounded-2xl p-5 sm:p-6 border border-stone-200/90 shadow-sm hover:shadow-md transition-all duration-300 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200/60 flex items-center justify-center text-2xl shrink-0 group-hover:scale-110 transition-transform">
              🔥
            </div>
            <div>
              <h3 class="text-sm sm:text-base font-bold text-[#0D3B1C]">
                {{ langService.isMarathi() ? 'चुलीवरची अस्सल चव' : 'Wood-Fired Cooking' }}
              </h3>
              <p class="text-xs text-stone-600 mt-1 leading-relaxed">
                {{ langService.isMarathi() ? 'पारंपरिक मातीच्या चुलीवर मंद आचेवर शिजवलेले गावरान पदार्थ.' : 'Traditional recipes cooked slowly on earthen wood-fired stoves.' }}
              </p>
            </div>
          </div>

          <div class="bg-white rounded-2xl p-5 sm:p-6 border border-stone-200/90 shadow-sm hover:shadow-md transition-all duration-300 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 border border-emerald-200/60 flex items-center justify-center text-2xl shrink-0 group-hover:scale-110 transition-transform">
              🌱
            </div>
            <div>
              <h3 class="text-sm sm:text-base font-bold text-[#0D3B1C]">
                {{ langService.isMarathi() ? '१००% सेंद्रिय व ताजे' : '100% Farm Fresh' }}
              </h3>
              <p class="text-xs text-stone-600 mt-1 leading-relaxed">
                {{ langService.isMarathi() ? 'थेट मळ्यातून ताजी तोडलेली सेंद्रिय फळे व ताज्या भाज्या.' : 'Directly harvested organic vegetables and seasonal fruits.' }}
              </p>
            </div>
          </div>

          <div class="bg-white rounded-2xl p-5 sm:p-6 border border-stone-200/90 shadow-sm hover:shadow-md transition-all duration-300 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-200/60 flex items-center justify-center text-2xl shrink-0 group-hover:scale-110 transition-transform">
              🍲
            </div>
            <div>
              <h3 class="text-sm sm:text-base font-bold text-[#0D3B1C]">
                {{ langService.isMarathi() ? 'अमर्यादित गावरान मेजवानी' : 'Unlimited Gavran Feasts' }}
              </h3>
              <p class="text-xs text-stone-600 mt-1 leading-relaxed">
                {{ langService.isMarathi() ? 'गरमागरम भाकरी, पिठलं, ठेचा, वांग्याचं भरीत आणि आपुलकीचे आदरातिथ्य.' : 'Hot Bhakri, Pithla, Thecha, Bharit, and warm village hospitality.' }}
              </p>
            </div>
          </div>
        </div>

        <!-- Dynamic Category Filter Pills -->
        @if (getDiningCategories().length > 1) {
          <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-2.5 pt-2">
            <button 
              type="button"
              (click)="selectDiningCategory('all')"
              [class.bg-[#0D3B1C]]="selectedDiningCategory() === 'all'"
              [class.text-amber-300]="selectedDiningCategory() === 'all'"
              [class.border-emerald-800]="selectedDiningCategory() === 'all'"
              [class.shadow-md]="selectedDiningCategory() === 'all'"
              [class.scale-105]="selectedDiningCategory() === 'all'"
              [class.bg-white]="selectedDiningCategory() !== 'all'"
              [class.text-stone-700]="selectedDiningCategory() !== 'all'"
              [class.hover:bg-stone-100]="selectedDiningCategory() !== 'all'"
              [class.border-stone-200]="selectedDiningCategory() !== 'all'"
              class="px-4 sm:px-5 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold border transition-all duration-300 flex items-center gap-2 cursor-pointer shadow-sm">
              <span>🍽️</span>
              <span>{{ langService.isMarathi() ? 'सर्व मेनू' : 'All Menus' }}</span>
              <span 
                [class.bg-amber-400/20]="selectedDiningCategory() === 'all'"
                [class.text-amber-300]="selectedDiningCategory() === 'all'"
                [class.bg-stone-100]="selectedDiningCategory() !== 'all'"
                [class.text-stone-600]="selectedDiningCategory() !== 'all'"
                class="px-2 py-0.5 rounded-full text-[10px] font-black">
                {{ diningItems().length }}
              </span>
            </button>

            @for (cat of getDiningCategories(); track cat) {
              <button 
                type="button"
                (click)="selectDiningCategory(cat)"
                [class.bg-[#0D3B1C]]="selectedDiningCategory() === cat"
                [class.text-amber-300]="selectedDiningCategory() === cat"
                [class.border-emerald-800]="selectedDiningCategory() === cat"
                [class.shadow-md]="selectedDiningCategory() === cat"
                [class.scale-105]="selectedDiningCategory() === cat"
                [class.bg-white]="selectedDiningCategory() !== cat"
                [class.text-stone-700]="selectedDiningCategory() !== cat"
                [class.hover:bg-stone-100]="selectedDiningCategory() !== cat"
                [class.border-stone-200]="selectedDiningCategory() !== cat"
                class="px-4 sm:px-5 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold border transition-all duration-300 flex items-center gap-2 cursor-pointer shadow-sm">
                <span>{{ getCategoryIcon(cat) }}</span>
                <span>{{ cat }}</span>
                <span 
                  [class.bg-amber-400/20]="selectedDiningCategory() === cat"
                  [class.text-amber-300]="selectedDiningCategory() === cat"
                  [class.bg-stone-100]="selectedDiningCategory() !== cat"
                  [class.text-stone-600]="selectedDiningCategory() !== cat"
                  class="px-2 py-0.5 rounded-full text-[10px] font-black">
                  {{ getCategoryCount(cat) }}
                </span>
              </button>
            }
          </div>
        }

        <!-- Loading Skeleton -->
        @if (diningLoading()) {
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for (i of [1, 2, 3, 4, 5, 6]; track $index) {
              <div class="bg-white rounded-3xl overflow-hidden border border-stone-200/90 shadow-sm animate-pulse flex flex-col h-96">
                <div class="aspect-[16/10] bg-stone-200"></div>
                <div class="p-6 space-y-3 flex-1 flex flex-col justify-start">
                  <div class="space-y-2.5">
                    <div class="h-5 w-24 bg-stone-200 rounded-full"></div>
                    <div class="h-6 w-3/4 bg-stone-200 rounded-lg"></div>
                    <div class="h-4 w-full bg-stone-200 rounded-md"></div>
                    <div class="h-4 w-5/6 bg-stone-200 rounded-md"></div>
                  </div>
                </div>
              </div>
            }
          </div>
        } @else if (filteredDiningItems().length === 0) {
          <div class="py-16 text-center text-stone-500 bg-white rounded-3xl border border-stone-200/80 p-8 shadow-xs max-w-lg mx-auto">
            <span class="text-4xl block mb-3">🍽️</span>
            <p class="text-base font-bold text-[#0D3B1C]">
              {{ langService.isMarathi() ? 'सध्या कोणतेही खाद्य मेनू उपलब्ध नाहीत.' : 'No dining menus currently available.' }}
            </p>
          </div>
        } @else {
          <!-- Dynamic Premium Dining Cards Grid -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for (item of filteredDiningItems(); track item.id) {
              <div class="bg-white rounded-3xl overflow-hidden border border-stone-200/90 shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1.5 group flex flex-col h-full agro-card">
                
                <!-- Image Area with Badges -->
                <div class="aspect-[16/10] overflow-hidden bg-stone-100 relative">
                  <img 
                    [src]="getDiningImage(item)" 
                    [alt]="item.title" 
                    loading="lazy"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                  
                  <!-- Top-Left Category Badge -->
                  @if (item.category) {
                    <div class="absolute top-3.5 left-3.5 px-3 py-1 bg-[#0D3B1C]/90 backdrop-blur-md text-amber-200 text-xs font-bold rounded-full border border-amber-400/30 shadow-md">
                      {{ item.category }}
                    </div>
                  }

                  <!-- Top-Right Dietary Tag -->
                  @if (item.dietary_type === 'pure_veg') {
                    <div class="absolute top-3.5 right-3.5 px-2.5 py-1 bg-emerald-600/90 backdrop-blur-md text-white text-[10px] font-black rounded-full shadow-md flex items-center gap-1">
                      <span>🟢</span>
                      <span>{{ langService.isMarathi() ? 'शुद्ध शाकाहारी' : 'Pure Veg' }}</span>
                    </div>
                  } @else if (item.dietary_type === 'village_style') {
                    <div class="absolute top-3.5 right-3.5 px-2.5 py-1 bg-amber-600/90 backdrop-blur-md text-white text-[10px] font-black rounded-full shadow-md flex items-center gap-1">
                      <span>🌾</span>
                      <span>{{ langService.isMarathi() ? 'गावरान पद्धत' : 'Village Style' }}</span>
                    </div>
                  }
                </div>

                <!-- Content Area -->
                <div class="p-6 sm:p-7 flex-1 flex flex-col justify-start space-y-3">
                  @if (item.badge) {
                    <div>
                      <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 border border-amber-300/80 text-[#0D3B1C] text-xs font-black rounded-full shadow-xs">
                        <span>{{ item.badge_icon || '🍛' }}</span>
                        <span>{{ item.badge }}</span>
                      </span>
                    </div>
                  }

                  <h3 class="text-xl font-black text-[#0D3B1C] group-hover:text-emerald-700 transition-colors leading-snug">
                    {{ item.title }}
                  </h3>

                  @if (item.short_description) {
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed font-normal">
                      {{ item.short_description }}
                    </p>
                  }
                </div>

              </div>
            }
          </div>
        }

        <!-- Bottom Group & Family Feast Booking Callout Banner -->
        <div class="relative bg-gradient-to-r from-[#061e0d] via-[#0D3B1C] to-[#082813] rounded-3xl p-6 sm:p-10 text-white overflow-hidden shadow-xl border border-amber-400/30">
          <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-6 lg:gap-8">
            <div class="space-y-2 text-center lg:text-left">
              <span class="inline-flex items-center gap-1.5 px-3.5 py-1 bg-amber-400/20 border border-amber-400/40 rounded-full text-xs font-black text-amber-300 shadow-sm">
                <span>🌾</span>
                <span>{{ langService.isMarathi() ? 'खास मेजवानी बुकिंग' : 'Special Feast Booking' }}</span>
              </span>
              <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white tracking-tight">
                {{ langService.isMarathi() ? 'कुटुंब किंवा ग्रुपसाठी खास गावरान जेवणाचे नियोजन करत आहात?' : 'Planning a Family or Group Dining Experience?' }}
              </h2>
              <p class="text-xs sm:text-sm text-stone-200 max-w-2xl font-normal leading-relaxed">
                {{ langService.isMarathi() ? 'शालेय सहली, कौटुंबिक स्नेहसंमेलन, वाढदिवस आणि कॉर्पोरेट आऊटिंगसाठी खास सानुकूलित गावरान भोजन पॅकेजेस उपलब्ध.' : 'Customized authentic village meal packages available for school picnics, family get-togethers, birthdays, and corporate outings.' }}
              </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto shrink-0">
              <a 
                href="tel:+919158141414"
                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm rounded-xl border border-white/25 transition-all shadow-sm">
                <span>📞</span>
                <span>+91 91581 41414</span>
              </a>
              <a 
                routerLink="/packages"
                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-amber-400 hover:bg-amber-300 text-stone-950 font-black text-xs sm:text-sm rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                <span>📋</span>
                <span>{{ langService.isMarathi() ? 'सर्व पॅकेजेस पहा' : 'View Packages' }}</span>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  `
})
export class VillageFlavorsComponent implements OnInit {
  langService = inject(LanguageService);
  private diningService = inject(DiningService);
  private settingService = inject(SettingService);

  settings = signal<SiteSettings | null>(null);
  diningItems = signal<DiningItem[]>([]);
  diningLoading = signal(true);
  selectedDiningCategory = signal<string>('all');

  constructor() {
    effect(() => {
      this.langService.currentLang();
      this.loadDining();
    });
  }

  ngOnInit() {
    this.loadDining();
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.settings.set(res.data);
        }
      },
      error: () => {}
    });
  }

  loadDining() {
    this.diningLoading.set(true);
    this.diningService.getDiningItems().subscribe({
      next: (res) => {
        this.diningItems.set(res.data || []);
        this.diningLoading.set(false);
      },
      error: () => this.diningLoading.set(false)
    });
  }

  getDiningCategories(): string[] {
    const cats = new Set<string>();
    this.diningItems().forEach(item => {
      if (item.category && item.category.trim().length > 0) cats.add(item.category.trim());
    });
    return Array.from(cats);
  }

  getCategoryCount(cat: string): number {
    return this.diningItems().filter(item => item.category === cat).length;
  }

  getCategoryIcon(cat: string): string {
    const lower = cat.toLowerCase();
    if (lower.includes('breakfast') || lower.includes('नाश्ता') || lower.includes('सकाळ')) return '🌅';
    if (lower.includes('lunch') || lower.includes('dinner') || lower.includes('जेवण') || lower.includes('दुपार')) return '🍲';
    if (lower.includes('special') || lower.includes('आकर्षण') || lower.includes('खास')) return '🔥';
    if (lower.includes('tea') || lower.includes('snack') || lower.includes('चहा') || lower.includes('स्नॅक्स')) return '☕';
    if (lower.includes('fruit') || lower.includes('फळे') || lower.includes('सेंद्रिय')) return '🍇';
    if (lower.includes('group') || lower.includes('ग्रुप') || lower.includes('मेजवानी')) return '👥';
    return '🍽️';
  }

  filteredDiningItems(): DiningItem[] {
    const cat = this.selectedDiningCategory();
    if (cat === 'all') return this.diningItems();
    return this.diningItems().filter(item => item.category === cat);
  }

  selectDiningCategory(cat: string) {
    this.selectedDiningCategory.set(cat);
  }

  getDiningImage(item: DiningItem): string {
    if (item.image && item.image.trim().length > 0) return item.image;
    return 'images/authentic-maharashtrian-cuisine.png';
  }

  enquireDishOnWhatsApp(dish: DiningItem, event: Event) {
    event.stopPropagation();
    event.preventDefault();

    const phone = this.settings()?.site?.phone || '+919158141414';
    const cleanPhone = phone.replace(/[^0-9]/g, '');

    const isMr = this.langService.isMarathi();
    const title = dish.title || (isMr ? 'गावरान खाद्य मेनू' : 'Authentic Dining Menu');
    let msg = '';
    if (isMr) {
      msg = `नमस्कार! मी विसावा ॲग्रो टुरिझम – बाबांचा मळा येथील "${title}" या खाद्य मेन्यूबद्दल चौकशी करत आहे. कृपया मेनू आणि उपलब्धतेची माहिती द्या.`;
    } else {
      msg = `Hello! I would like to enquire about the "${title}" dining menu at Visawa Agro Tourism – Babacha Mala. Please share details and availability.`;
    }

    const whatsappUrl = `https://wa.me/${cleanPhone}?text=${encodeURIComponent(msg)}`;
    window.open(whatsappUrl, '_blank', 'noopener,noreferrer');
  }
}

