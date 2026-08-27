import { Component, inject, signal, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanguageService } from '../../core/services/language.service';
import { SettingService } from '../../core/services/setting.service';
import { SiteSettings } from '../../core/models/setting.model';

@Component({
  selector: 'app-floating-whatsapp',
  standalone: true,
  imports: [CommonModule],
  template: `
    <!-- Floating Official WhatsApp Button: Fixed at Bottom-Right corner across the entire website -->
    <aside 
      aria-label="WhatsApp Chat Support" 
      class="fixed bottom-20 md:bottom-6 right-4 md:right-6 z-50 group flex items-center gap-2.5">
      
      <!-- Desktop Hover Tooltip -->
      <span class="hidden md:inline-flex items-center gap-1.5 px-3 py-1.5 bg-stone-900/95 text-white text-[11px] font-semibold rounded-full shadow-xl border border-stone-700/60 opacity-0 group-hover:opacity-100 transition-all duration-200 transform translate-x-2 group-hover:translate-x-0 whitespace-nowrap backdrop-blur-md pointer-events-none">
        <span class="w-2 h-2 rounded-full bg-[#25D366] animate-pulse"></span>
        <span>{{ langService.isMarathi() ? 'व्हॉट्सॲपवर थेट संपर्क करा' : 'Chat on WhatsApp' }}</span>
      </span>

      <!-- Compact Circular WhatsApp Button -->
      <a 
        [href]="getWhatsAppUrl()"
        target="_blank"
        rel="noopener noreferrer"
        [attr.aria-label]="langService.isMarathi() ? 'व्हॉट्सॲपवर संपर्क करा' : 'Contact on WhatsApp'"
        class="relative w-9 h-9 md:w-10 md:h-10 rounded-full bg-[#25D366] hover:bg-[#20BD5A] text-white flex items-center justify-center shadow-2xl shadow-black/40 hover:shadow-[#25D366]/50 transition-all duration-300 transform hover:scale-110 active:scale-95 focus:outline-none focus:ring-4 focus:ring-[#25D366]/40 cursor-pointer border border-white/25">
        
        <!-- Subtle Ambient Glow -->
        <span class="absolute -inset-0.5 rounded-full bg-[#25D366] opacity-30 group-hover:opacity-60 blur-[3px] transition-opacity -z-10"></span>

        <!-- Official WhatsApp SVG Logo -->
        <svg class="w-5 h-5 md:w-[22px] md:h-[22px] fill-white shrink-0 drop-shadow-xs" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 00-3.48-8.413z"/>
        </svg>
      </a>
    </aside>
  `
})
export class FloatingWhatsappComponent implements OnInit {
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
    const rawPhone = this.settings()?.site?.phone || '+91 98765 43210';
    const digits = rawPhone ? rawPhone.replace(/\D/g, '') : '';
    const phone = digits.length === 10 ? `91${digits}` : (digits || '919876543210');
    const msg = this.langService.isMarathi()
      ? 'नमस्कार, मला विसावा ॲग्रो टुरिझम – बाबांचा मळा येथे बुकिंग व चौकशी करायची आहे.'
      : 'Hello, I would like to enquire about Visawa Agro Tourism – Babacha Mala bookings.';
    return `https://wa.me/${phone}?text=${encodeURIComponent(msg)}`;
  }
}
