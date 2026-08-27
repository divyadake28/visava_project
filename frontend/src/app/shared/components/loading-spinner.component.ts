import { Component, Input, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanguageService } from '../../core/services/language.service';

@Component({
  selector: 'app-loading-spinner',
  standalone: true,
  imports: [CommonModule],
  template: `
    <div class="py-16 text-center">
      <div class="inline-block w-10 h-10 border-4 border-emerald-600 border-t-transparent rounded-full animate-spin"></div>
      <p class="mt-4 text-xs font-bold text-stone-500 tracking-wide">{{ message || langService.t('state.loading') }}</p>
    </div>
  `
})
export class LoadingSpinnerComponent {
  @Input() message?: string;
  langService = inject(LanguageService);
}