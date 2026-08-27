import { Component, OnInit, inject, signal, effect } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { ActivityService } from '../../core/services/activity.service';
import { LanguageService } from '../../core/services/language.service';
import { SettingService } from '../../core/services/setting.service';
import { Activity } from '../../core/models/activity.model';
import { LoadingSpinnerComponent } from '../../shared/components/loading-spinner.component';
import { EmptyStateComponent } from '../../shared/components/empty-state.component';

@Component({
  selector: 'app-experiences',
  standalone: true,
  imports: [CommonModule, RouterModule, LoadingSpinnerComponent, EmptyStateComponent],
  template: `
    <!-- Hero Banner -->
    <div class="relative py-16 lg:py-24 bg-emerald-950 text-white overflow-hidden">
      <div class="absolute inset-0 z-0">
        <img 
          src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=1920&auto=format&fit=crop&q=85" 
          alt="Visawa Agro Experiences" 
          class="w-full h-full object-cover opacity-25 scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-950 via-emerald-950/90 to-stone-900/80"></div>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-emerald-500/20 border border-emerald-400/30 rounded-full text-xs font-bold text-emerald-300 backdrop-blur-md">
          <span>🌿</span>
          <span>{{ langService.t('exp.badge') }}</span>
        </div>
        <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white drop-shadow-md">
          {{ langService.t('exp.title') }}
        </h1>
        <p class="text-xs sm:text-sm lg:text-base text-emerald-100 max-w-2xl mx-auto font-medium">
          {{ langService.t('exp.subtitle') }}
        </p>
      </div>
    </div>

    <!-- Experiences Grid Section -->
    <section class="py-16 sm:py-20 bg-stone-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        @if (loading()) {
          <app-loading-spinner [message]="langService.t('exp.loading')"></app-loading-spinner>
        } @else if (error()) {
          <div class="p-8 bg-rose-50 border border-rose-200 rounded-3xl text-center space-y-3 max-w-md mx-auto">
            <div class="text-3xl">⚠️</div>
            <p class="text-xs text-rose-700 font-bold">{{ langService.t('exp.error') }}</p>
            <button (click)="loadActivities()" class="px-4 py-2 bg-rose-600 text-white text-xs font-bold rounded-xl shadow-sm hover:bg-rose-700 transition">
              Retry
            </button>
          </div>
        } @else if (activities().length === 0) {
          <app-empty-state [title]="langService.t('exp.empty')"></app-empty-state>
        } @else {
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for (act of activities(); track act.id) {
              <div class="bg-white rounded-3xl border border-stone-200/80 shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col group agro-card">
                <!-- Activity Image Container with Consistent Aspect Ratio & Gradient -->
                <div class="relative h-60 bg-stone-100 overflow-hidden">
                  <img 
                    [src]="getActivityImage(act)" 
                    [alt]="act.title || 'Visawa Activity'"
                    loading="lazy"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20"></div>
                  
                  @if (act.icon) {
                    <div class="absolute top-4 left-4 w-11 h-11 rounded-2xl bg-emerald-950/85 backdrop-blur-md text-emerald-300 flex items-center justify-center text-xl shadow-lg border border-emerald-400/30">
                      {{ act.icon }}
                    </div>
                  }
                  <div class="absolute top-4 right-4 px-3.5 py-1 bg-emerald-700/90 text-white text-[11px] font-black rounded-full backdrop-blur-sm shadow-md">
                    {{ langService.isMarathi() ? 'बाबांचा मळा' : 'Babacha Mala' }}
                  </div>
                  
                  <!-- Floating Title on Bottom Overlay for quick glance -->
                  <div class="absolute bottom-3 left-4 right-4">
                    <span class="px-2.5 py-1 bg-black/40 backdrop-blur-sm rounded-lg text-white font-bold text-xs tracking-wide">
                      ⭐ {{ langService.isMarathi() ? 'खास आकर्षण' : 'Special Experience' }}
                    </span>
                  </div>
                </div>

                <!-- Content Area -->
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                  <div class="space-y-2">
                    <h3 class="text-lg font-black text-stone-900 group-hover:text-emerald-700 transition-colors leading-snug">
                      {{ act.title }}
                    </h3>
                    <p class="text-xs text-stone-600 leading-relaxed line-clamp-3">
                      {{ act.short_description || act.description }}
                    </p>
                  </div>

                  <div class="pt-4 border-t border-stone-100">
                    <button 
                      type="button"
                      (click)="enquireOnWhatsApp(act)"
                      class="w-full py-3.5 bg-gradient-to-r from-emerald-600 to-teal-700 hover:from-emerald-500 hover:to-teal-600 text-white text-xs font-bold rounded-2xl shadow-md shadow-emerald-700/20 transition transform hover:scale-[1.02] flex items-center justify-center gap-2 cursor-pointer">
                      <span class="text-[#25D366]"><svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 00-3.48-8.413z"/></svg></span>
                      <span>{{ langService.isMarathi() ? 'व्हॉट्सॲपवर माहिती विचारा' : 'Enquire on WhatsApp' }}</span>
                    </button>
                  </div>
                </div>
              </div>
            }
          </div>
        }
      </div>
    </section>
  `
})
export class ExperiencesComponent implements OnInit {
  private activityService = inject(ActivityService);
  private settingService = inject(SettingService);
  langService = inject(LanguageService);

  activities = signal<Activity[]>([]);
  loading = signal<boolean>(true);
  error = signal<string | null>(null);

  constructor() {
    effect(() => {
      // Re-trigger whenever user switches language
      const lang = this.langService.currentLang();
      this.loadActivities(lang);
    });
  }

  ngOnInit(): void {
    this.loadActivities();
  }

  loadActivities(lang?: string): void {
    this.loading.set(true);
    this.error.set(null);

    this.activityService.getActivities(lang).subscribe({
      next: (res) => {
        this.activities.set(res.data || []);
        this.loading.set(false);
      },
      error: (err) => {
        console.error('Failed to load activities', err);
        this.error.set('Failed to load experiences');
        this.loading.set(false);
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

  enquireOnWhatsApp(act: Activity): void {
    const phone = '919876543210';
    const isMr = this.langService.isMarathi();
    const msg = isMr
      ? `नमस्कार! मी विसावा ॲग्रो टुरिझम – बाबांचा मळा येथील "${act.title}" या उपक्रमाबद्दल अधिक माहिती आणि बुकिंगसाठी चौकशी करू इच्छितो.`
      : `Hello! I would like to enquire and get more information about the "${act.title}" experience at Visawa Agro Tourism – Babacha Mala.`;

    const url = `https://wa.me/${phone}?text=${encodeURIComponent(msg)}`;
    window.open(url, '_blank');
  }
}