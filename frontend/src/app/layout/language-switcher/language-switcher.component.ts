import { Component, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanguageService, LanguageCode } from '../../core/services/language.service';

@Component({
  selector: 'app-language-switcher',
  standalone: true,
  imports: [CommonModule],
  template: `
    <div class="inline-flex items-center bg-emerald-900/90 p-1 rounded-full border border-emerald-800 shadow-inner">
      <button 
        type="button"
        (click)="switchLang('mr')"
        [class.bg-gradient-to-r]="langService.currentLang() === 'mr'"
        [class.from-amber-500]="langService.currentLang() === 'mr'"
        [class.to-orange-500]="langService.currentLang() === 'mr'"
        [class.text-stone-950]="langService.currentLang() === 'mr'"
        [class.shadow-md]="langService.currentLang() === 'mr'"
        [class.text-emerald-200]="langService.currentLang() !== 'mr'"
        class="px-2.5 sm:px-3 py-1.5 text-[11px] font-black rounded-full transition-all duration-200 cursor-pointer">
        मराठी
      </button>
      <button 
        type="button"
        (click)="switchLang('en')"
        [class.bg-gradient-to-r]="langService.currentLang() === 'en'"
        [class.from-amber-500]="langService.currentLang() === 'en'"
        [class.to-orange-500]="langService.currentLang() === 'en'"
        [class.text-stone-950]="langService.currentLang() === 'en'"
        [class.shadow-md]="langService.currentLang() === 'en'"
        [class.text-emerald-200]="langService.currentLang() !== 'en'"
        class="px-2.5 sm:px-3 py-1.5 text-[11px] font-black rounded-full transition-all duration-200 cursor-pointer">
        English
      </button>
    </div>
  `
})
export class LanguageSwitcherComponent {
  langService = inject(LanguageService);

  switchLang(lang: LanguageCode) {
    this.langService.setLanguage(lang);
  }
}