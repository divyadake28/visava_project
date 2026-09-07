import { Component, Input, Output, EventEmitter, HostListener } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-lightbox-modal',
  standalone: true,
  imports: [CommonModule],
  template: `
    <div 
      *ngIf="isOpen"
      class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-stone-950/95 backdrop-blur-md animate-fade-up"
      (click)="onBackdropClick($event)">
      
      <!-- Top Bar: Index Counter & Close Button -->
      <div class="absolute top-4 left-4 right-4 sm:top-6 sm:left-6 sm:right-6 z-50 flex items-center justify-between pointer-events-none">
        <div *ngIf="totalCount > 1" class="px-3.5 py-1.5 rounded-full bg-black/60 border border-white/10 text-white/90 text-xs font-bold pointer-events-auto backdrop-blur-md shadow-lg">
          {{ currentIndex + 1 }} / {{ totalCount }}
        </div>
        <div *ngIf="totalCount <= 1"></div>

        <button 
          type="button" 
          (click)="close.emit()" 
          class="p-3 rounded-full bg-white/10 hover:bg-white/25 text-white transition focus:outline-none cursor-pointer pointer-events-auto shadow-lg backdrop-blur-md">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>

      <!-- Prev Button -->
      <button 
        *ngIf="totalCount > 1"
        type="button" 
        (click)="onPrev($event)"
        aria-label="Previous Image"
        class="absolute left-1 sm:left-6 top-1/2 -translate-y-1/2 z-50 p-2 sm:p-4 rounded-full bg-black/60 sm:bg-black/50 hover:bg-emerald-600/90 text-white transition transform hover:scale-110 focus:outline-none cursor-pointer border border-white/10 shadow-2xl backdrop-blur-md">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
      </button>

      <!-- Main Image Container -->
      <div class="relative max-w-5xl w-full max-h-[88vh] bg-stone-900 rounded-3xl overflow-hidden shadow-2xl border border-stone-800 flex flex-col" (click)="$event.stopPropagation()">
        <div class="relative flex-1 bg-black flex items-center justify-center overflow-hidden min-h-[300px] max-h-[72vh] group">
          <img 
            [src]="imageUrl" 
            [alt]="title || 'Visawa Agro Tourism'" 
            class="max-w-full max-h-[72vh] object-contain transition-all duration-500 ease-out transform group-hover:scale-[1.02]">
        </div>
        
        <!-- Bottom Caption -->
        <div *ngIf="title || category" class="p-4 sm:p-6 bg-stone-950 border-t border-stone-800/80 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
          <div>
            <h3 class="text-sm sm:text-base font-bold text-white tracking-wide">{{ title }}</h3>
            <p *ngIf="caption" class="text-xs text-stone-400 mt-0.5">{{ caption }}</p>
          </div>
          <span *ngIf="category" class="inline-flex items-center self-start sm:self-auto px-3 py-1 bg-emerald-900/80 border border-emerald-700/60 rounded-full text-xs font-semibold text-emerald-300 whitespace-nowrap shadow-sm">
            {{ category }}
          </span>
        </div>
      </div>

      <!-- Next Button -->
      <button 
        *ngIf="totalCount > 1"
        type="button" 
        (click)="onNext($event)"
        aria-label="Next Image"
        class="absolute right-1 sm:right-6 top-1/2 -translate-y-1/2 z-50 p-2 sm:p-4 rounded-full bg-black/60 sm:bg-black/50 hover:bg-emerald-600/90 text-white transition transform hover:scale-110 focus:outline-none cursor-pointer border border-white/10 shadow-2xl backdrop-blur-md">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
      </button>
    </div>
  `
})
export class LightboxModalComponent {
  @Input() isOpen = false;
  @Input() imageUrl = '';
  @Input() title = '';
  @Input() caption = '';
  @Input() category = '';
  @Input() currentIndex = 0;
  @Input() totalCount = 0;

  @Output() close = new EventEmitter<void>();
  @Output() prev = new EventEmitter<void>();
  @Output() next = new EventEmitter<void>();

  private touchStartX = 0;
  private touchEndX = 0;

  @HostListener('document:keydown', ['$event'])
  handleKeyboardEvent(event: KeyboardEvent) {
    if (!this.isOpen) return;

    if (event.key === 'Escape') {
      this.close.emit();
    } else if (event.key === 'ArrowLeft') {
      this.prev.emit();
    } else if (event.key === 'ArrowRight') {
      this.next.emit();
    }
  }

  @HostListener('touchstart', ['$event'])
  onTouchStart(event: TouchEvent) {
    if (!this.isOpen) return;
    this.touchStartX = event.changedTouches[0].screenX;
  }

  @HostListener('touchend', ['$event'])
  onTouchEnd(event: TouchEvent) {
    if (!this.isOpen) return;
    this.touchEndX = event.changedTouches[0].screenX;
    const diff = this.touchEndX - this.touchStartX;
    if (Math.abs(diff) > 45) {
      if (diff > 0) {
        this.prev.emit();
      } else {
        this.next.emit();
      }
    }
  }

  onBackdropClick(event: MouseEvent) {
    this.close.emit();
  }

  onPrev(event: MouseEvent) {
    event.stopPropagation();
    this.prev.emit();
  }

  onNext(event: MouseEvent) {
    event.stopPropagation();
    this.next.emit();
  }
}