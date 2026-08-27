import { Component, inject, signal, OnInit, HostListener } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { SettingService } from '../../core/services/setting.service';
import { SiteSettings } from '../../core/models/setting.model';
import { LanguageSwitcherComponent } from '../language-switcher/language-switcher.component';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [CommonModule, RouterModule, LanguageSwitcherComponent],
  template: `
    <!-- Permanently Fixed Main Navigation Bar with Slim Announcement Strip -->
    <header 
      [class.shadow-xl]="isScrolled()"
      [class.bg-[#0D3B1C]/98]="isScrolled()"
      [class.bg-[#0D3B1C]]="!isScrolled()"
      [class.border-emerald-900/60]="isScrolled()"
      [class.border-emerald-900/30]="!isScrolled()"
      class="fixed top-0 left-0 w-full z-50 backdrop-blur-xl border-b text-white transition-all duration-300">
      
      <!-- Refined Slim Top Announcement & Contact Strip -->
      <div class="hidden md:block bg-[#082813] border-b border-emerald-900/40 py-1 px-4 text-[11px] font-medium text-emerald-200/90 tracking-wide">
        <div class="max-w-[1600px] mx-auto flex items-center justify-between gap-4">
          <div class="flex items-center gap-4">
            <span class="inline-flex items-center gap-1.5 text-amber-300 font-semibold">
              <span class="text-xs">📍</span>
              <span>{{ langService.isMarathi() ? 'बाबांचा मळा, महाराष्ट्र' : 'Babacha Mala, Maharashtra' }}</span>
            </span>
            <span class="text-emerald-800">|</span>
            <span class="inline-flex items-center gap-1.5 text-emerald-200/80">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
              <span>{{ langService.isMarathi() ? 'चुलीवरची अस्सल मिसळ व वीकेंड कॉटेज बुकिंग सुरू आहे!' : 'Season Special: Authentic Chulivarchi Misal & Weekend Cottage Stays Open!' }}</span>
            </span>
          </div>

          <div class="flex items-center gap-4 text-[11px]">
            <a [href]="'tel:' + (settings()?.site?.phone || '+919876543210')" class="hover:text-amber-300 transition flex items-center gap-1.5 text-emerald-100 font-medium">
              <span>📞</span>
              <span>{{ settings()?.site?.phone || '+91 98765 43210' }}</span>
            </a>
            <span class="text-emerald-800">|</span>
            <a [href]="getWhatsAppUrl()" target="_blank" class="text-emerald-300 hover:text-amber-300 font-semibold transition flex items-center gap-1.5">
              <span class="w-4 h-4 text-[#25D366] flex items-center justify-center"><svg class="w-3.5 h-3.5 fill-current shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 00-3.48-8.413z"/></svg></span>
              <span>WhatsApp Direct</span>
            </a>
          </div>
        </div>
      </div>

      <div class="w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
        <div 
          [class.h-16]="isScrolled()"
          [class.h-18]="!isScrolled()"
          class="flex items-center justify-between gap-3 xl:gap-4 transition-all duration-300">
          
          <!-- Brand Logo & Title (Far Left) -->
          <a routerLink="/" class="flex items-center gap-2.5 sm:gap-3 group shrink-0">
            <div 
              [class.w-9]="isScrolled()"
              [class.h-9]="isScrolled()"
              [class.text-lg]="isScrolled()"
              [class.w-10]="!isScrolled()"
              [class.h-10]="!isScrolled()"
              [class.text-xl]="!isScrolled()"
              class="rounded-xl bg-gradient-to-tr from-emerald-600 via-teal-600 to-amber-500 flex items-center justify-center text-white font-black shadow-md shadow-emerald-950/40 group-hover:scale-105 transition-all duration-300 shrink-0 border border-amber-400/20">
              🌱
            </div>
            <div class="shrink-0">
              <div class="flex items-center gap-1.5">
                <span 
                  [class.text-base]="isScrolled()"
                  [class.text-lg]="!isScrolled()"
                  class="font-black tracking-tight text-white block leading-tight transition-all duration-300 whitespace-nowrap">
                  VISAWA
                </span>
                <span class="px-1.5 py-0.5 bg-amber-400/15 border border-amber-400/30 rounded-full text-[9px] sm:text-[10px] xl:text-[11px] font-bold text-amber-300 whitespace-nowrap">
                  बाबांचा मळा
                </span>
              </div>
              <span class="text-[9px] sm:text-[10px] xl:text-[11px] font-semibold text-emerald-300/90 tracking-wider block whitespace-nowrap">
                Agro Tourism & Resort
              </span>
            </div>
          </a>

          <!-- Desktop Navigation Menu (Active on xl >= 1200/1280px) -->
          <nav class="hidden xl:flex items-center justify-center gap-1.5 2xl:gap-2.5 flex-1 min-w-0 mx-2">
            <a 
              routerLink="/" 
              routerLinkActive="text-amber-300 font-bold border-b-2 border-amber-400" 
              [routerLinkActiveOptions]="{exact: true}" 
              class="px-2.5 2xl:px-3 py-1.5 rounded-lg text-[13px] 2xl:text-[14px] font-medium text-emerald-100 hover:text-amber-300 hover:bg-white/5 transition-all duration-200 whitespace-nowrap shrink-0">
              {{ langService.t('nav.home') }}
            </a>
            <a 
              routerLink="/about" 
              routerLinkActive="text-amber-300 font-bold border-b-2 border-amber-400" 
              class="px-2.5 2xl:px-3 py-1.5 rounded-lg text-[13px] 2xl:text-[14px] font-medium text-emerald-100 hover:text-amber-300 hover:bg-white/5 transition-all duration-200 whitespace-nowrap shrink-0">
              {{ langService.t('nav.about') }}
            </a>
            <a 
              routerLink="/experiences" 
              routerLinkActive="text-amber-300 font-bold border-b-2 border-amber-400" 
              class="px-2.5 2xl:px-3 py-1.5 rounded-lg text-[13px] 2xl:text-[14px] font-medium text-emerald-100 hover:text-amber-300 hover:bg-white/5 transition-all duration-200 whitespace-nowrap shrink-0">
              {{ langService.t('nav.experiences') }}
            </a>
            <a 
              routerLink="/packages" 
              routerLinkActive="text-amber-300 font-bold border-b-2 border-amber-400" 
              class="px-2.5 2xl:px-3 py-1.5 rounded-lg text-[13px] 2xl:text-[14px] font-medium text-emerald-100 hover:text-amber-300 hover:bg-white/5 transition-all duration-200 whitespace-nowrap shrink-0">
              {{ langService.t('nav.packages') }}
            </a>
            <a 
              routerLink="/events" 
              routerLinkActive="text-amber-300 font-bold border-b-2 border-amber-400" 
              class="px-2.5 2xl:px-3 py-1.5 rounded-lg text-[13px] 2xl:text-[14px] font-medium text-emerald-100 hover:text-amber-300 hover:bg-white/5 transition-all duration-200 whitespace-nowrap shrink-0">
              {{ langService.t('nav.events') }}
            </a>
            <a 
              routerLink="/gallery" 
              routerLinkActive="text-amber-300 font-bold border-b-2 border-amber-400" 
              class="px-2.5 2xl:px-3 py-1.5 rounded-lg text-[13px] 2xl:text-[14px] font-medium text-emerald-100 hover:text-amber-300 hover:bg-white/5 transition-all duration-200 whitespace-nowrap shrink-0">
              {{ langService.t('nav.gallery') }}
            </a>
            <a 
              routerLink="/blogs" 
              routerLinkActive="text-amber-300 font-bold border-b-2 border-amber-400" 
              class="px-2.5 2xl:px-3 py-1.5 rounded-lg text-[13px] 2xl:text-[14px] font-medium text-emerald-100 hover:text-amber-300 hover:bg-white/5 transition-all duration-200 whitespace-nowrap shrink-0">
              {{ langService.t('nav.blogs') }}
            </a>
            <a 
              routerLink="/contact" 
              routerLinkActive="text-amber-300 font-bold border-b-2 border-amber-400" 
              class="px-2.5 2xl:px-3 py-1.5 rounded-lg text-[13px] 2xl:text-[14px] font-medium text-emerald-100 hover:text-amber-300 hover:bg-white/5 transition-all duration-200 whitespace-nowrap shrink-0">
              {{ langService.t('nav.contact') }}
            </a>
          </nav>

          <!-- Language Switcher & Book Now CTA Button on Far Right (Desktop xl+) -->
          <div class="hidden xl:flex items-center gap-2.5 shrink-0">
            <app-language-switcher></app-language-switcher>
            
            <a routerLink="/contact" class="inline-flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 hover:from-amber-300 hover:to-amber-500 text-stone-950 font-black text-xs 2xl:text-xs rounded-full shadow-md shadow-amber-500/20 transition-all duration-300 transform hover:scale-105 whitespace-nowrap shrink-0 border border-amber-300/40">
              <span>{{ langService.t('nav.bookNow') }}</span>
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
          </div>

          <!-- Tablet & Mobile Action Bar (Language Switcher, Book Now CTA & Hamburger Button) -->
          <div class="flex xl:hidden items-center gap-2 shrink-0">
            <app-language-switcher></app-language-switcher>

            <a routerLink="/contact" class="hidden sm:inline-flex items-center gap-1 px-3 py-1.5 bg-gradient-to-r from-amber-400 to-amber-500 text-stone-950 font-black text-xs rounded-full shadow-md whitespace-nowrap">
              <span>{{ langService.t('nav.bookNow') }}</span>
            </a>

            <button 
              type="button"
              (click)="mobileMenuOpen.set(!mobileMenuOpen())"
              aria-label="Toggle Navigation Menu"
              class="p-2 rounded-xl bg-[#082813] border border-emerald-800 text-emerald-100 hover:text-white focus:outline-none transition cursor-pointer shadow-md">
              <svg *ngIf="!mobileMenuOpen()" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
              <svg *ngIf="mobileMenuOpen()" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile / Tablet Slide-Down Navigation Menu -->
      <div 
        *ngIf="mobileMenuOpen()" 
        class="xl:hidden absolute top-full left-0 right-0 z-50 bg-[#0D3B1C]/98 backdrop-blur-2xl border-b border-emerald-800 shadow-2xl px-6 py-6 space-y-3 animate-fade-up max-h-[85vh] overflow-y-auto">
        <a (click)="closeMobileMenu()" routerLink="/" routerLinkActive="text-amber-300 font-bold bg-white/10" [routerLinkActiveOptions]="{exact: true}" class="block px-3 py-2.5 text-base font-medium text-emerald-100 hover:text-white rounded-xl border-b border-emerald-900/60">
          {{ langService.t('nav.home') }}
        </a>
        <a (click)="closeMobileMenu()" routerLink="/about" routerLinkActive="text-amber-300 font-bold bg-white/10" class="block px-3 py-2.5 text-base font-medium text-emerald-100 hover:text-white rounded-xl border-b border-emerald-900/60">
          {{ langService.t('nav.about') }}
        </a>
        <a (click)="closeMobileMenu()" routerLink="/experiences" routerLinkActive="text-amber-300 font-bold bg-white/10" class="block px-3 py-2.5 text-base font-medium text-emerald-100 hover:text-white rounded-xl border-b border-emerald-900/60">
          {{ langService.t('nav.experiences') }}
        </a>
        <a (click)="closeMobileMenu()" routerLink="/packages" routerLinkActive="text-amber-300 font-bold bg-white/10" class="block px-3 py-2.5 text-base font-medium text-emerald-100 hover:text-white rounded-xl border-b border-emerald-900/60">
          {{ langService.t('nav.packages') }}
        </a>
        <a (click)="closeMobileMenu()" routerLink="/events" routerLinkActive="text-amber-300 font-bold bg-white/10" class="block px-3 py-2.5 text-base font-medium text-emerald-100 hover:text-white rounded-xl border-b border-emerald-900/60">
          {{ langService.t('nav.events') }}
        </a>
        <a (click)="closeMobileMenu()" routerLink="/gallery" routerLinkActive="text-amber-300 font-bold bg-white/10" class="block px-3 py-2.5 text-base font-medium text-emerald-100 hover:text-white rounded-xl border-b border-emerald-900/60">
          {{ langService.t('nav.gallery') }}
        </a>
        <a (click)="closeMobileMenu()" routerLink="/blogs" routerLinkActive="text-amber-300 font-bold bg-white/10" class="block px-3 py-2.5 text-base font-medium text-emerald-100 hover:text-white rounded-xl border-b border-emerald-900/60">
          {{ langService.t('nav.blogs') }}
        </a>
        <a (click)="closeMobileMenu()" routerLink="/contact" routerLinkActive="text-amber-300 font-bold bg-white/10" class="block px-3 py-2.5 text-base font-medium text-emerald-100 hover:text-white rounded-xl border-b border-emerald-900/60">
          {{ langService.t('nav.contact') }}
        </a>

        <!-- Mobile CTAs -->
        <div class="pt-4 space-y-3">
          <a (click)="closeMobileMenu()" routerLink="/contact" class="w-full py-3.5 bg-gradient-to-r from-amber-400 to-amber-500 text-stone-950 font-black text-sm rounded-2xl flex items-center justify-center gap-2 shadow-lg">
            <span>{{ langService.t('nav.bookNow') }}</span>
          </a>
          <a [href]="getWhatsAppUrl()" target="_blank" class="w-full py-3.5 bg-[#075E54] hover:bg-[#128C7E] text-white font-bold text-sm rounded-2xl flex items-center justify-center gap-2.5 border border-emerald-600/40 shadow-lg shadow-emerald-950/30 transition">
            <span class="w-5 h-5 text-[#25D366] flex items-center justify-center"><svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 00-3.48-8.413z"/></svg></span>
            <span>WhatsApp Concierge</span>
          </a>
        </div>
      </div>
    </header>

    <!-- Layout Spacer -->
    <div 
      [class.h-16]="isScrolled()"
      [class.h-20]="!isScrolled()"
      [class.md:h-24]="!isScrolled()"
      class="transition-all duration-300">
    </div>
  `
})
export class HeaderComponent implements OnInit {
  private settingService = inject(SettingService);
  langService = inject(LanguageService);

  settings = signal<SiteSettings | null>(null);
  mobileMenuOpen = signal<boolean>(false);
  isScrolled = signal<boolean>(false);

  ngOnInit(): void {
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.data) {
          this.settings.set(res.data);
        }
      },
      error: (err) => console.error('Failed to load settings', err)
    });
  }

  @HostListener('window:scroll', [])
  onWindowScroll(): void {
    this.isScrolled.set(window.scrollY > 20);
  }

  closeMobileMenu(): void {
    this.mobileMenuOpen.set(false);
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