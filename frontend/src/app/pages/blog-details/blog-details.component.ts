import { Component, inject, signal, OnInit, effect, Input } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, ActivatedRoute } from '@angular/router';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';
import { LanguageService } from '../../core/services/language.service';
import { BlogService } from '../../core/services/blog.service';
import { Blog } from '../../core/models/blog.model';
import { LoadingSpinnerComponent } from '../../shared/components/loading-spinner.component';
import { EmptyStateComponent } from '../../shared/components/empty-state.component';

@Component({
  selector: 'app-blog-details',
  standalone: true,
  imports: [CommonModule, RouterModule, LoadingSpinnerComponent, EmptyStateComponent],
  templateUrl: './blog-details.component.html'
})
export class BlogDetailsComponent implements OnInit {
  langService = inject(LanguageService);
  private route = inject(ActivatedRoute);
  private blogService = inject(BlogService);
  private sanitizer = inject(DomSanitizer);

  @Input() slug = '';
  blog = signal<Blog | null>(null);
  loading = signal(true);
  error = signal(false);

  constructor() {
    effect(() => {
      this.langService.currentLang();
      if (this.slug) {
        this.loadBlogDetails(this.slug);
      }
    });
  }

  ngOnInit() {
    this.route.paramMap.subscribe(params => {
      const slugParam = params.get('slug');
      if (slugParam) {
        this.slug = slugParam;
        this.loadBlogDetails(slugParam);
      }
    });
  }

  loadBlogDetails(slug: string) {
    this.loading.set(true);
    this.error.set(false);

    this.blogService.getBlogBySlug(slug).subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.blog.set(res.data);
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

  getYouTubeEmbedUrl(videoId?: string | null, url?: string | null): SafeResourceUrl | null {
    let id = videoId;
    if (!id && url) {
      const match = url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?|shorts)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i);
      id = match ? match[1] : null;
    }
    if (!id) return null;
    return this.sanitizer.bypassSecurityTrustResourceUrl(`https://www.youtube-nocookie.com/embed/${id}?rel=0`);
  }

  getInstagramEmbedUrl(url?: string | null): SafeResourceUrl | null {
    if (!url) return null;
    // Normalize trailing slash and append /embed
    const cleanUrl = url.split('?')[0].replace(/\/+$/, '');
    if (cleanUrl.includes('/p/') || cleanUrl.includes('/reel/') || cleanUrl.includes('/tv/')) {
      return this.sanitizer.bypassSecurityTrustResourceUrl(`${cleanUrl}/embed`);
    }
    return null;
  }
}
