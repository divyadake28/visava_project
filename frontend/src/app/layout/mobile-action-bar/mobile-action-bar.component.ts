import { Component, inject, signal, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { SettingService } from '../../core/services/setting.service';
import { SiteSettings } from '../../core/models/setting.model';

@Component({
  selector: 'app-mobile-action-bar',
  standalone: true,
  imports: [CommonModule, RouterModule],
  template: `
    <!-- Mobile Sticky Action Bar (Hidden on mobile screens) -->
    <aside aria-label="Mobile Quick Actions" class="hidden fixed bottom-0 left-0 right-0 z-40 bg-[#0D3B1C]/98 backdrop-blur-2xl border-t border-emerald-900/80 p-2.5 shadow-2xl">
      <div class="max-w-md mx-auto grid grid-cols-3 gap-2">
        
        <!-- 1. Direct Call Button -->
        <a 
          [href]="'tel:' + (settings()?.site?.phone || '+919158141414')"
          class="py-2 px-2 bg-white/5 hover:bg-white/10 text-white font-bold text-xs rounded-xl border border-emerald-800/80 transition-all flex flex-col items-center justify-center gap-0.5 text-center active:scale-95 shadow-sm">
          <span class="text-base">📞</span>
          <span class="text-[10px] leading-tight font-bold text-emerald-100">{{ langService.isMarathi() ? 'कॉल करा' : 'Call Resort' }}</span>
        </a>

        <!-- 2. WhatsApp Instant Booking (Primary High-Conversion CTA) -->
        <a 
          [href]="getWhatsAppUrl()"
          target="_blank"
          rel="noopener noreferrer"
          class="py-2 px-2 bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 hover:from-emerald-500 hover:to-teal-500 text-white font-black text-xs rounded-xl transition-all flex flex-col items-center justify-center gap-0.5 text-center active:scale-95 shadow-lg shadow-emerald-950/40 border border-emerald-500/30">
          <span class="text-[#25D366] my-0.5"><svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 00-3.48-8.413z"/></svg></span>
          <span class="text-[10px] leading-tight font-black text-amber-300">{{ langService.isMarathi() ? 'व्हॉट्सॲप' : 'WhatsApp' }}</span>
        </a>

        <!-- 3. Packages / Book Now CTA -->
        <a 
          routerLink="/packages"
          class="py-2 px-2 bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 hover:from-amber-300 hover:to-amber-500 text-stone-950 font-black text-xs rounded-xl transition-all flex flex-col items-center justify-center gap-0.5 text-center active:scale-95 shadow-md border border-amber-300/40">
          <span class="text-base">📋</span>
          <span class="text-[10px] leading-tight font-bold">{{ langService.isMarathi() ? 'पॅकेजेस' : 'Packages' }}</span>
        </a>

      </div>
    </aside>
  `
})
export class MobileActionBarComponent implements OnInit {
  langService = inject(LanguageService);
  private settingService = inject(SettingService);

  settings = signal<SiteSettings | null>(null);

  ngOnInit(): void {
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.data) {
          this.settings.set(res.data);
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
      ? 'नमस्कार, मला विसावा ॲग्रो टुरिझम – बाबांचा मळा येथे बुकिंग व चौकशी करायची आहे.'
      : 'Hello, I would like to enquire about Visawa Agro Tourism – Babacha Mala bookings.';
    return `https://wa.me/${phone}?text=${encodeURIComponent(msg)}`;
  }
}
