import { Component, inject, signal, OnInit, effect } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { BlogService } from '../../core/services/blog.service';
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

  blogs = signal<Blog[]>([]);
  loading = signal(true);

  constructor() {
    effect(() => {
      this.langService.currentLang();
      this.loadBlogs();
    });
  }

  ngOnInit() {
    this.loadBlogs();
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
}
