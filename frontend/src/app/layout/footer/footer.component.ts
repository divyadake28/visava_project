import { Component, inject, signal, OnInit, effect, computed } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { SettingService } from '../../core/services/setting.service';
import { ActivityService } from '../../core/services/activity.service';
import { SiteSettings } from '../../core/models/setting.model';
import { Activity } from '../../core/models/activity.model';

@Component({
  selector: 'app-footer',
  standalone: true,
  imports: [CommonModule, RouterModule],
  template: `
    <footer class="bg-[#0D3B1C] text-emerald-100 text-xs border-t border-emerald-900/60 shadow-2xl relative z-10">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
        <!-- 4-Column Responsive Grid with Generous Spacing -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-14">
          
          <!-- Column 1: Brand Info & Trust Badges -->
          <div class="space-y-5">
            <a routerLink="/" class="flex items-center gap-3 group">
              <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-emerald-600 via-teal-600 to-amber-500 flex items-center justify-center text-white text-2xl shadow-lg border border-amber-400/25 group-hover:scale-105 transition-transform duration-300">
                🌱
              </div>
              <div>
                <span class="text-base font-black text-white tracking-wide block group-hover:text-amber-300 transition-colors">
                  {{ langService.isMarathi() ? 'विसावा ॲग्रो टुरिझम' : 'VISAWA AGRO RESORT' }}
                </span>
                <span class="text-[11px] font-bold text-amber-300 tracking-wider block">
                  {{ langService.isMarathi() ? 'बाबांचा मळा' : 'Babacha Mala' }}
                </span>
              </div>
            </a>

            <p class="text-xs text-emerald-200/90 leading-relaxed font-normal">
              {{ langService.t('footer.about') }}
            </p>

            <!-- Trust Badges -->
            <div class="flex flex-wrap items-center gap-2 pt-1">
              <span class="inline-flex items-center gap-1.5 px-3.5 py-1 bg-white/5 border border-emerald-800/80 rounded-full text-[11px] font-semibold text-amber-300 shadow-sm">
                <span>🌿</span>
                <span>{{ langService.isMarathi() ? '१००% सेंद्रिय मळा' : '100% Organic Farm' }}</span>
              </span>
              <span class="inline-flex items-center gap-1.5 px-3.5 py-1 bg-white/5 border border-emerald-800/80 rounded-full text-[11px] font-semibold text-emerald-300 shadow-sm">
                <span>★</span>
                <span>{{ langService.isMarathi() ? '४.९/५ कौटुंबिक रेटिंग' : '4.9/5 Guest Rating' }}</span>
              </span>
            </div>
          </div>

          <!-- Column 2: Quick Links (All 8 Core Pages) -->
          <div class="space-y-4">
            <h4 class="text-xs font-black text-amber-300 uppercase tracking-widest flex items-center gap-2 border-b border-emerald-900/80 pb-2.5">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
              <span>{{ langService.t('footer.quickLinks') }}</span>
            </h4>
            <ul class="space-y-2.5 text-emerald-200/90 font-medium">
              <li>
                <a routerLink="/" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                  <span class="text-emerald-500 font-bold">›</span>
                  <span>{{ langService.t('nav.home') }}</span>
                </a>
              </li>
              <li>
                <a routerLink="/about" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                  <span class="text-emerald-500 font-bold">›</span>
                  <span>{{ langService.t('nav.about') }}</span>
                </a>
              </li>
              <li>
                <a routerLink="/experiences" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                  <span class="text-emerald-500 font-bold">›</span>
                  <span>{{ langService.t('nav.experiences') }}</span>
                </a>
              </li>
              <li>
                <a routerLink="/packages" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                  <span class="text-emerald-500 font-bold">›</span>
                  <span>{{ langService.t('nav.packages') }}</span>
                </a>
              </li>
              <li>
                <a routerLink="/events" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                  <span class="text-emerald-500 font-bold">›</span>
                  <span>{{ langService.t('nav.events') }}</span>
                </a>
              </li>
              <li>
                <a routerLink="/gallery" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                  <span class="text-emerald-500 font-bold">›</span>
                  <span>{{ langService.t('nav.gallery') }}</span>
                </a>
              </li>
              <li>
                <a routerLink="/blogs" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                  <span class="text-emerald-500 font-bold">›</span>
                  <span>{{ langService.t('nav.blogs') }}</span>
                </a>
              </li>
              <li>
                <a routerLink="/contact" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                  <span class="text-emerald-500 font-bold">›</span>
                  <span>{{ langService.t('nav.contact') }}</span>
                </a>
              </li>
            </ul>
          </div>

          <!-- Column 3: Top Experiences (Dynamic from Activities API) -->
          <div class="space-y-4">
            <h4 class="text-xs font-black text-amber-300 uppercase tracking-widest flex items-center gap-2 border-b border-emerald-900/80 pb-2.5">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
              <span>{{ langService.t('footer.experiences') }}</span>
            </h4>
            <ul class="space-y-2.5 text-emerald-200/90 font-medium">
              @if (topActivities().length > 0) {
                @for (act of topActivities(); track act.id) {
                  <li>
                    <a routerLink="/experiences" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                      <span class="text-emerald-400 font-bold">{{ act.icon || '🌿' }}</span>
                      <span class="line-clamp-1">{{ act.title }}</span>
                    </a>
                  </li>
                }
              } @else {
                <li>
                  <a routerLink="/experiences" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-1.5 transition-all">
                    <span class="text-emerald-400">🏊‍♂️</span>
                    <span>{{ langService.isMarathi() ? 'स्विमिंग पूल व विहीर स्नान' : 'Swimming Pool' }}</span>
                  </a>
                </li>
                <li>
                  <a routerLink="/experiences" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-1.5 transition-all">
                    <span class="text-emerald-400">🎵</span>
                    <span>{{ langService.isMarathi() ? 'रेन डान्स व म्युझिक पार्टी' : 'Rain Dance' }}</span>
                  </a>
                </li>
                <li>
                  <a routerLink="/experiences" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-1.5 transition-all">
                    <span class="text-emerald-400">🍇</span>
                    <span>{{ langService.isMarathi() ? 'द्राक्ष बागा शिवार फेरी' : 'Grape Vineyard Tour' }}</span>
                  </a>
                </li>
                <li>
                  <a routerLink="/experiences" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-1.5 transition-all">
                    <span class="text-emerald-400">🍲</span>
                    <span>{{ langService.isMarathi() ? 'चुलीवरची अस्सल गावरान मिसळ' : 'Wood-Fired Misal' }}</span>
                  </a>
                </li>
              }
            </ul>

            <div class="pt-2">
              <a routerLink="/experiences" class="inline-flex items-center gap-1 text-[11px] font-bold text-amber-300 hover:text-amber-200 underline underline-offset-4 transition">
                <span>{{ langService.isMarathi() ? 'सर्व १० उपक्रम एक्सप्लोर करा →' : 'Explore All 10 Activities →' }}</span>
              </a>
            </div>
          </div>

          <!-- Column 4: Contact Us & WhatsApp CTA -->
          <div class="space-y-4">
            <h4 class="text-xs font-black text-amber-300 uppercase tracking-widest flex items-center gap-2 border-b border-emerald-900/80 pb-2.5">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
              <span>{{ langService.t('footer.contact') }}</span>
            </h4>
            
            <div class="space-y-3.5 text-emerald-200/90 font-medium">
              <div class="flex items-start gap-2.5">
                <span class="text-amber-400 text-sm mt-0.5 shrink-0">📍</span>
                <span class="leading-relaxed">
                  {{ settings()?.site?.address || (langService.isMarathi() ? 'विसावा ॲग्रो टुरिझम – बाबांचा मळा, महाराष्ट्र, भारत' : 'Visawa Agro Tourism – Babacha Mala, Maharashtra, India') }}
                </span>
              </div>

              <div class="flex items-center gap-2.5">
                <span class="text-amber-400 text-sm shrink-0">📞</span>
                <a [href]="'tel:' + (settings()?.site?.phone || '+919876543210')" class="hover:text-amber-300 font-bold transition">
                  {{ settings()?.site?.phone || '+91 98765 43210' }}
                </a>
              </div>

              <div class="flex items-center gap-2.5">
                <span class="text-amber-400 text-sm shrink-0">✉️</span>
                <a [href]="'mailto:' + (settings()?.site?.email || 'info@visava.com')" class="hover:text-amber-300 transition">
                  {{ settings()?.site?.email || 'info@visava.com' }}
                </a>
              </div>

              <!-- WhatsApp Chat Button -->
              <div class="pt-2">
                <a 
                  [href]="getWhatsAppUrl()" 
                  target="_blank" 
                  rel="noopener noreferrer"
                  class="w-full py-3 px-4 bg-gradient-to-r from-emerald-700 to-teal-700 hover:from-emerald-600 hover:to-teal-600 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-lg shadow-emerald-950/40 border border-emerald-600/30 transition-all duration-300 transform hover:scale-[1.02]">
                  <span class="text-[#25D366]"><svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 00-3.48-8.413z"/></svg></span>
                  <span>{{ langService.isMarathi() ? 'व्हॉट्सॲपवर संपर्क करा' : 'WhatsApp Concierge' }}</span>
                </a>
              </div>
            </div>
          </div>

        </div>

        <!-- Footer Bottom Bar -->
        <div class="mt-14 pt-6 border-t border-emerald-900/60 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-emerald-300/80">
          <p class="text-center sm:text-left">
            © {{ currentYear }} Visawa Agro Tourism – Babacha Mala. {{ langService.isMarathi() ? 'सर्व हक्क राखीव.' : 'All Rights Reserved.' }}
          </p>
          <p class="text-amber-300/90 font-medium italic text-center sm:text-right tracking-wide">
            "{{ langService.t('brand.tagline') }}"
          </p>
        </div>
      </div>
    </footer>
  `
})
export class FooterComponent implements OnInit {
  langService = inject(LanguageService);
  private settingService = inject(SettingService);
  private activityService = inject(ActivityService);

  settings = signal<SiteSettings | null>(null);
  activities = signal<Activity[]>([]);
  currentYear = new Date().getFullYear();

  topActivities = computed(() => {
    return this.activities().slice(0, 4);
  });

  constructor() {
    effect(() => {
      this.langService.currentLang();
      this.loadActivities();
    });
  }

  ngOnInit(): void {
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.data) {
          this.settings.set(res.data);
        }
      },
      error: (err) => console.error('Failed to load footer settings', err)
    });
    this.loadActivities();
  }

  loadActivities(): void {
    this.activityService.getActivities().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.activities.set(res.data);
        }
      },
      error: () => {}
    });
  }

  getWhatsAppUrl(): string {
    const rawPhone = this.settings()?.site?.phone || '+91 98765 43210';
    const digits = rawPhone ? rawPhone.replace(/\D/g, '') : '';
    const phone = digits.length === 10 ? `91${digits}` : (digits || '919876543210');
    const msg = this.langService.isMarathi()
      ? 'नमस्कार, मला विसावा ॲग्रो टुरिझमबद्दल माहिती हवी आहे.'
      : 'Hello, I would like more information about Visawa Agro Tourism – Babacha Mala.';
    return `https://wa.me/${phone}?text=${encodeURIComponent(msg)}`;
  }
}