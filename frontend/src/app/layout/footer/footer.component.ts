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
    <footer class="bg-[#0B4F2F] text-emerald-100 text-xs border-t border-emerald-700/40 shadow-2xl relative z-10">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-11 pb-9">
        <!-- 4-Column Responsive Grid with Compact Balanced Spacing -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
          
          <!-- Column 1: Brand Info & Trust Badges -->
          <div class="space-y-3.5">
            <a routerLink="/" class="inline-block group" aria-label="विसावा ॲग्रो टुरिझम">
              <div class="h-20 sm:h-24 rounded-2xl overflow-hidden shadow-lg inline-block group-hover:scale-105 transition-transform duration-300 border border-white/15 bg-white">
                <img 
                  src="/images/visava_logo.png" 
                  alt="विसावा ॲग्रो टुरिझम" 
                  class="h-full w-auto object-contain block">
              </div>
            </a>

            <p class="text-xs text-emerald-100/90 leading-relaxed font-normal">
              {{ langService.t('footer.about') }}
            </p>

            <!-- Trust Badges -->
            <div class="flex flex-wrap items-center gap-2 pt-0.5">
              <span class="inline-flex items-center gap-1.5 px-3 py-0.5 bg-white/10 border border-emerald-600/40 rounded-full text-[11px] font-semibold text-amber-300 shadow-sm backdrop-blur-sm">
                <span>🌿</span>
                <span>{{ langService.isMarathi() ? '१००% सेंद्रिय मळा' : '100% Organic Farm' }}</span>
              </span>
              <span class="inline-flex items-center gap-1.5 px-3 py-0.5 bg-white/10 border border-emerald-600/40 rounded-full text-[11px] font-semibold text-emerald-200 shadow-sm backdrop-blur-sm">
                <span>★</span>
                <span>{{ langService.isMarathi() ? '४.९/५ कौटुंबिक रेटिंग' : '4.9/5 Guest Rating' }}</span>
              </span>
            </div>
          </div>

          <!-- Column 2: Quick Links (All 8 Core Pages) -->
          <div class="space-y-3">
            <h4 class="text-xs font-black text-amber-300 uppercase tracking-widest flex items-center gap-2 border-b border-emerald-700/50 pb-2">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
              <span>{{ langService.t('footer.quickLinks') }}</span>
            </h4>
            <ul class="space-y-1.5 text-emerald-200/90 font-medium">
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
                <a routerLink="/village-flavors" class="hover:text-amber-300 hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-200">
                  <span class="text-emerald-500 font-bold">›</span>
                  <span>{{ langService.t('nav.villageFlavors') }}</span>
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
          <div class="space-y-3">
            <h4 class="text-xs font-black text-amber-300 uppercase tracking-widest flex items-center gap-2 border-b border-emerald-700/50 pb-2">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
              <span>{{ langService.t('footer.experiences') }}</span>
            </h4>
            <ul class="space-y-1.5 text-emerald-200/90 font-medium">
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

            <div class="pt-1.5">
              <a routerLink="/experiences" class="inline-flex items-center gap-1 text-[11px] font-bold text-amber-300 hover:text-amber-200 underline underline-offset-4 transition">
                <span>{{ langService.isMarathi() ? 'सर्व १० उपक्रम एक्सप्लोर करा →' : 'Explore All 10 Activities →' }}</span>
              </a>
            </div>
          </div>

          <!-- Column 4: Contact Us & WhatsApp CTA -->
          <div class="space-y-3">
            <h4 class="text-xs font-black text-amber-300 uppercase tracking-widest flex items-center gap-2 border-b border-emerald-700/50 pb-2">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
              <span>{{ langService.t('footer.contact') }}</span>
            </h4>
            
            <div class="space-y-2.5 text-emerald-200/90 font-medium">
              <div class="flex items-start gap-2.5">
                <span class="text-amber-400 text-sm mt-0.5 shrink-0">📍</span>
                <span class="leading-relaxed">
                  {{ langService.t('footer.shortAddress') }}
                </span>
              </div>

              <div class="flex items-center gap-2.5">
                <span class="text-amber-400 text-sm shrink-0">📞</span>
                <a [href]="'tel:' + (settings()?.site?.phone || '+919158141414')" class="hover:text-amber-300 font-bold transition">
                  {{ settings()?.site?.phone || '+91 91581 41414' }}
                </a>
              </div>

              <div class="flex items-center gap-2.5">
                <span class="text-amber-400 text-sm shrink-0">✉️</span>
                <a [href]="'mailto:' + (settings()?.site?.email || 'Visawaagrotourism@gmail.com')" class="hover:text-amber-300 transition">
                  {{ settings()?.site?.email || 'Visawaagrotourism@gmail.com' }}
                </a>
              </div>

              <!-- Action Buttons (Instagram & WhatsApp) -->
              <div class="pt-1.5 space-y-2">
                <!-- Instagram Follow Button -->
                <a 
                  [href]="settings()?.social?.instagram || 'https://www.instagram.com/visawaagrotourism'" 
                  target="_blank" 
                  rel="noopener noreferrer"
                  aria-label="Follow Visawa Agro Tourism on Instagram"
                  class="w-full py-2.5 px-4 bg-[#07361B] hover:bg-[#0A4523] text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2.5 shadow-md border border-amber-400/40 hover:border-amber-300 transition-all duration-300 transform hover:scale-[1.02] group">
                  <span class="w-5 h-5 rounded-[6px] bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] flex items-center justify-center text-white shadow-xs shrink-0 group-hover:scale-110 transition-transform">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                  </span>
                  <span>{{ langService.isMarathi() ? 'इन्स्टाग्रामवर फॉलो करा' : 'Follow us on Instagram' }}</span>
                </a>

                <!-- WhatsApp Chat Button -->
                <a 
                  [href]="getWhatsAppUrl()" 
                  target="_blank" 
                  rel="noopener noreferrer"
                  class="w-full py-2.5 px-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-lg shadow-emerald-950/30 border border-emerald-500/30 transition-all duration-300 transform hover:scale-[1.02]">
                  <span class="text-[#25D366]"><svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 00-3.48-8.413z"/></svg></span>
                  <span>{{ langService.isMarathi() ? 'व्हॉट्सॲपवर संपर्क करा' : 'WhatsApp Concierge' }}</span>
                </a>
              </div>
            </div>
          </div>

        </div>

        <!-- Footer Bottom Bar -->
        <div class="mt-8 pt-4 border-t border-emerald-700/40 flex flex-col sm:flex-row items-center justify-between gap-3 text-[11px] text-emerald-200/90">
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

  private initialLangLoaded = false;

  constructor() {
    effect(() => {
      this.langService.currentLang();
      if (!this.initialLangLoaded) {
        this.initialLangLoaded = true;
        return;
      }
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
    const rawPhone = this.settings()?.site?.phone || '+91 91581 41414';
    const digits = rawPhone ? rawPhone.replace(/\D/g, '') : '';
    const phone = digits.length === 10 ? `91${digits}` : (digits || '919158141414');
    const msg = this.langService.isMarathi()
      ? 'नमस्कार, मला विसावा ॲग्रो टुरिझमबद्दल माहिती हवी आहे.'
      : 'Hello, I would like more information about Visawa Agro Tourism – Babacha Mala.';
    return `https://wa.me/${phone}?text=${encodeURIComponent(msg)}`;
  }
}