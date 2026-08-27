import { Component, inject, signal, OnInit, effect } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { EventService } from '../../core/services/event.service';
import { EventItem } from '../../core/models/event.model';
import { LoadingSpinnerComponent } from '../../shared/components/loading-spinner.component';
import { EmptyStateComponent } from '../../shared/components/empty-state.component';

@Component({
  selector: 'app-events',
  standalone: true,
  imports: [CommonModule, RouterModule, LoadingSpinnerComponent, EmptyStateComponent],
  templateUrl: './events.component.html'
})
export class EventsComponent implements OnInit {
  langService = inject(LanguageService);
  private eventService = inject(EventService);

  events = signal<EventItem[]>([]);
  loading = signal(true);

  constructor() {
    effect(() => {
      this.langService.currentLang();
      this.loadEvents();
    });
  }

  ngOnInit() {
    this.loadEvents();
  }

  loadEvents() {
    this.loading.set(true);
    this.eventService.getEvents().subscribe({
      next: (res) => {
        this.events.set(res.success && res.data ? res.data : []);
        this.loading.set(false);
      },
      error: () => this.loading.set(false)
    });
  }

  getEventImage(evt: EventItem): string {
    if (evt.image && evt.image.trim().length > 0) {
      return evt.image;
    }
    const title = ((evt.title || '') + ' ' + (evt.slug || '')).toLowerCase();
    if (title.includes('birthday') || title.includes('वाढदिवस') || title.includes('party')) {
      return 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('school') || title.includes('शालेय') || title.includes('college') || title.includes('picnic')) {
      return 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('corporate') || title.includes('कॉर्पोरेट') || title.includes('meeting') || title.includes('team')) {
      return 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('family') || title.includes('कौटुंबिक') || title.includes('gathering')) {
      return 'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('wedding') || title.includes('photoshoot') || title.includes('प्री-वेडिंग') || title.includes('कपल')) {
      return 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80';
    }
    if (title.includes('cultural') || title.includes('सांस्कृतिक') || title.includes('folk') || title.includes('program')) {
      return 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80';
    }
    return 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&auto=format&fit=crop&q=80';
  }
}
