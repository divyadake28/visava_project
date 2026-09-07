import { Component, inject, signal } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';

@Component({
  selector: 'app-faq',
  standalone: true,
  imports: [CommonModule, RouterModule],
  template: `
    <!-- Hero Banner -->
    <div class="relative py-20 lg:py-28 bg-[#0D3B1C] text-white overflow-hidden">
      <div class="absolute inset-0 z-0">
        <img 
          src="/images/visawa_grand_entrance_hero.jpg" 
          alt="Visawa Agro Tourism FAQs" 
          class="w-full h-full object-cover">
        <div class="absolute inset-0 page-hero-overlay"></div>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#0D3B1C]/85 border border-amber-400/40 rounded-full text-xs font-bold text-amber-300 backdrop-blur-md shadow-md">
          <span>❓</span>
          <span>{{ langService.t('faq.badge') }}</span>
        </div>
        <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white hero-title-shadow">
          {{ langService.t('faq.title') }}
        </h1>
        <p class="text-sm sm:text-base text-white/95 max-w-2xl mx-auto font-medium hero-desc-shadow">
          {{ langService.t('faq.subtitle') }}
        </p>
      </div>
    </div>

    <!-- FAQ Accordion Section -->
    <section class="pt-16 sm:pt-20 pb-3 sm:pb-3.5 bg-stone-50">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        @for (faq of faqs; track faq.id) {
          <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden transition-all duration-300">
            <button 
              type="button"
              (click)="toggleFaq(faq.id)"
              class="w-full p-6 text-left flex items-center justify-between gap-4 font-bold text-stone-900 hover:text-emerald-700 transition cursor-pointer">
              <span class="text-sm sm:text-base font-extrabold">{{ langService.t(faq.qKey) }}</span>
              <span class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 text-sm font-black transition-transform duration-300" [class.rotate-180]="openId() === faq.id">
                ↓
              </span>
            </button>
            @if (openId() === faq.id) {
              <div class="px-6 pb-6 text-xs sm:text-sm text-stone-600 leading-relaxed border-t border-stone-100 pt-4 animate-fade-up">
                {{ langService.t(faq.aKey) }}
              </div>
            }
          </div>
        }

        <!-- Still have questions banner -->
        <div class="mt-12 p-8 bg-gradient-to-br from-emerald-900 to-teal-950 text-white rounded-3xl shadow-xl flex flex-col sm:flex-row items-center justify-between gap-6">
          <div>
            <h3 class="text-lg font-black text-white">
              {{ langService.isMarathi() ? 'अजून काही शंका किंवा प्रश्न आहेत का?' : 'Still have queries or need customized packages?' }}
            </h3>
            <p class="text-xs text-emerald-200 mt-1">
              {{ langService.isMarathi() ? 'आमच्या टीमशी थेट व्हॉट्सॲपवर बोला किंवा फोनवर संपर्क साधा.' : 'Connect directly with our hospitality manager on WhatsApp or phone.' }}
            </p>
          </div>
          <div class="flex items-center gap-3 shrink-0">
            <a href="https://wa.me/919158141414" target="_blank" class="px-5 py-3 bg-[#25D366] hover:bg-[#20BD5A] text-white font-black text-xs rounded-xl shadow-md transition flex items-center gap-2">
              <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 00-3.48-8.413z"/></svg>
              <span>WhatsApp</span>
            </a>
            <a href="tel:+919158141414" class="px-5 py-3 bg-white/10 hover:bg-white/20 text-white font-bold text-xs rounded-xl border border-white/20 transition">
              📞 Call
            </a>
          </div>
        </div>
      </div>
    </section>
  `
})
export class FaqComponent {
  langService = inject(LanguageService);
  openId = signal<number | null>(1);

  faqs = [
    { id: 1, qKey: 'faq.q1', aKey: 'faq.a1' },
    { id: 2, qKey: 'faq.q2', aKey: 'faq.a2' },
    { id: 3, qKey: 'faq.q3', aKey: 'faq.a3' },
    { id: 4, qKey: 'faq.q4', aKey: 'faq.a4' },
    { id: 5, qKey: 'faq.q5', aKey: 'faq.a5' },
    { id: 6, qKey: 'faq.q6', aKey: 'faq.a6' },
  ];

  toggleFaq(id: number): void {
    this.openId.set(this.openId() === id ? null : id);
  }
}