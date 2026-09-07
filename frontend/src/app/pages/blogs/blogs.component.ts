import { Component, inject, signal, OnInit, effect } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { BlogService } from '../../core/services/blog.service';
import { SettingService } from '../../core/services/setting.service';
import { Blog } from '../../core/models/blog.model';
import { LoadingSpinnerComponent } from '../../shared/components/loading-spinner.component';
import { EmptyStateComponent } from '../../shared/components/empty-state.component';

@Component({
  selector: 'app-blogs',
  standalone: true,
  imports: [CommonModule, RouterModule, LoadingSpinnerComponent, EmptyStateComponent],
  templateUrl: './blogs.component.html'
})
export class BlogsComponent implements OnInit {
  langService = inject(LanguageService);
  private blogService = inject(BlogService);
  private settingService = inject(SettingService);

  blogs = signal<Blog[]>([]);
  settings = signal<any | null>(null);
  loading = signal(true);

  constructor() {
    effect(() => {
      this.langService.currentLang();
      this.loadBlogs();
    });
  }

  ngOnInit() {
    this.loadBlogs();
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.settings.set(res.data);
        }
      }
    });
  }

  loadBlogs() {
    this.loading.set(true);
    this.blogService.getBlogs().subscribe({
      next: (res) => {
        this.blogs.set(res.success && res.data ? res.data : []);
        this.loading.set(false);
      },
      error: () => this.loading.set(false)
    });
  }

  getCategoryIcon(blog: Blog): string {
    const text = ((blog.title || '') + ' ' + (blog.short_description || '')).toLowerCase();
    if (text.includes('celebrat') || text.includes('birthday') || text.includes('वाढदिवस') || text.includes('सोहळा')) return '🎉';
    if (text.includes('food') || text.includes('misal') || text.includes('जेवण') || text.includes('मिसळ') || text.includes('हुरडा')) return '🍲';
    if (text.includes('farm') || text.includes('शेती') || text.includes('शिवार') || text.includes('द्राक्ष')) return '🚜';
    if (text.includes('festival') || text.includes('raksha') || text.includes('उत्सव') || text.includes('सण')) return '🎊';
    if (text.includes('family') || text.includes('कौटुंबिक') || text.includes('कुटुंब')) return '👨‍👩‍👧';
    if (text.includes('adventure') || text.includes('सफर') || text.includes('निसर्ग')) return '🏕';
    return '🌿';
  }

  getCategoryLabel(blog: Blog): string {
    const isMr = this.langService.isMarathi();
    const text = ((blog.title || '') + ' ' + (blog.short_description || '')).toLowerCase();
    if (text.includes('celebrat') || text.includes('birthday') || text.includes('वाढदिवस') || text.includes('सोहळा')) {
      return isMr ? 'सेलिब्रेशन' : 'Celebration';
    }
    if (text.includes('food') || text.includes('misal') || text.includes('जेवण') || text.includes('मिसळ') || text.includes('हुरडा')) {
      return isMr ? 'पारंपरिक भोजन' : 'Traditional Food';
    }
    if (text.includes('farm') || text.includes('शेती') || text.includes('शिवार') || text.includes('द्राक्ष')) {
      return isMr ? 'शेती अनुभव' : 'Farm Experience';
    }
    if (text.includes('festival') || text.includes('raksha') || text.includes('उत्सव') || text.includes('सण')) {
      return isMr ? 'उत्सव सोहळा' : 'Festival Event';
    }
    if (text.includes('family') || text.includes('कौटुंबिक') || text.includes('कुटुंब')) {
      return isMr ? 'कौटुंबिक मेळावा' : 'Family Gathering';
    }
    if (text.includes('adventure') || text.includes('सफर') || text.includes('निसर्ग')) {
      return isMr ? 'ग्रामीण सफर' : 'Rural Adventure';
    }
    return isMr ? 'कृषी पर्यटन' : 'Agro Tourism';
  }

  getReadTime(blog: Blog): string {
    const text = (blog.title || '') + ' ' + (blog.description || '') + ' ' + (blog.short_description || '');
    const words = text.trim().split(/\s+/).length;
    const minutes = Math.max(2, Math.ceil(words / 150));
    return this.langService.isMarathi() ? `${minutes} मिनिटे वाचन` : `${minutes} min read`;
  }
}
