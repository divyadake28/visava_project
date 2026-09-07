import { Component, inject, signal, OnInit, effect, Input, computed } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, ActivatedRoute } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { EventService } from '../../core/services/event.service';
import { SettingService } from '../../core/services/setting.service';
import { EventItem } from '../../core/models/event.model';
import { SiteSettings } from '../../core/models/setting.model';
import { LoadingSpinnerComponent } from '../../shared/components/loading-spinner.component';
import { EmptyStateComponent } from '../../shared/components/empty-state.component';

@Component({
  selector: 'app-event-details',
  standalone: true,
  imports: [CommonModule, RouterModule, LoadingSpinnerComponent, EmptyStateComponent],
  templateUrl: './event-details.component.html'
})
export class EventDetailsComponent implements OnInit {
  langService = inject(LanguageService);
  private route = inject(ActivatedRoute);
  private eventService = inject(EventService);
  private settingService = inject(SettingService);

  @Input() slug = '';
  event = signal<EventItem | null>(null);
  settings = signal<SiteSettings | null>(null);
  loading = signal(true);
  error = signal(false);

  formattedWhatsAppNumber = computed(() => {
    const rawPhone = this.settings()?.site?.phone || '+91 91581 41414';
    if (!rawPhone) return '';
    const digits = rawPhone.replace(/\D/g, '');
    if (!digits) return '';
    if (digits.length === 10) {
      return `91${digits}`;
    }
    return digits;
  });

  constructor() {
    effect(() => {
      this.langService.currentLang();
      if (this.slug) {
        this.loadEventDetails(this.slug);
      }
    });
  }

  ngOnInit() {
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.settings.set(res.data);
        }
      },
      error: () => {}
    });

    this.route.paramMap.subscribe(params => {
      const slugParam = params.get('slug');
      if (slugParam) {
        this.slug = slugParam;
        this.loadEventDetails(slugParam);
      }
    });
  }

  loadEventDetails(slug: string) {
    this.loading.set(true);
    this.error.set(false);

    this.eventService.getEventBySlug(slug).subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.event.set(res.data);
        } else {
          this.error.set(true);
        }
        this.loading.set(false);
      },
      error: () => {
        this.error.set(true);
        this.loading.set(false);
      }
    });
  }

  getEventImage(evt: EventItem | null): string {
    if (!evt) return 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200&auto=format&fit=crop&q=80';
    if (evt.image && evt.image.trim().length > 0) {
      return evt.image;
    }
    const title = ((evt.title || '') + ' ' + (evt.slug || '')).toLowerCase();
    if (title.includes('birthday') || title.includes('वाढदिवस') || title.includes('party')) {
      return 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('school') || title.includes('शालेय') || title.includes('college') || title.includes('picnic')) {
      return 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('corporate') || title.includes('कॉर्पोरेट') || title.includes('meeting') || title.includes('team')) {
      return 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('family') || title.includes('कौटुंबिक') || title.includes('gathering')) {
      return 'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('wedding') || title.includes('photoshoot') || title.includes('प्री-वेडिंग') || title.includes('कपल')) {
      return 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&auto=format&fit=crop&q=80';
    }
    if (title.includes('cultural') || title.includes('सांस्कृतिक') || title.includes('folk') || title.includes('program')) {
      return 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=1200&auto=format&fit=crop&q=80';
    }
    return 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200&auto=format&fit=crop&q=80';
  }

  openWhatsAppEnquiry() {
    const currentEvt = this.event();
    const phone = this.formattedWhatsAppNumber();
    if (!currentEvt || !phone) return;

    const title = currentEvt.title || 'Event & Celebration';
    const loc = currentEvt.location || 'Babacha Mala';

    let message = '';
    if (this.langService.isMarathi()) {
      message = `नमस्कार, मला "${title}" या कार्यक्रमाबद्दल/इव्हेंटबद्दल माहिती हवी आहे. ठिकाण: ${loc}. कृपया उपलब्ध तारखा आणि बुकिंगचे तपशील पाठवा.`;
    } else {
      message = `Hello, I would like more information about "${title}". Location: ${loc}. Please share available dates and booking details.`;
    }

    const encodedMessage = encodeURIComponent(message);
    const whatsappUrl = `https://wa.me/${phone}?text=${encodedMessage}`;
    window.open(whatsappUrl, '_blank', 'noopener,noreferrer');
  }
}
