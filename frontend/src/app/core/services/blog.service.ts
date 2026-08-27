import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';
import { LanguageService } from './language.service';
import { ApiResponse } from '../models/api-response.model';
import { Blog } from '../models/blog.model';

@Injectable({
  providedIn: 'root'
})
export class BlogService {
  private http = inject(HttpClient);
  private langService = inject(LanguageService);
  private baseUrl = `${environment.apiUrl}/blogs`;

  getBlogs(): Observable<ApiResponse<Blog[]>> {
    const params = new HttpParams().set('lang', this.langService.currentLang());
    return this.http.get<ApiResponse<Blog[]>>(this.baseUrl, { params });
  }

  getBlogBySlug(slug: string): Observable<ApiResponse<Blog>> {
    const params = new HttpParams().set('lang', this.langService.currentLang());
    return this.http.get<ApiResponse<Blog>>(`${this.baseUrl}/${slug}`, { params });
  }
}