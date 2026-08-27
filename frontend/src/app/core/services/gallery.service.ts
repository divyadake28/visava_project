import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';
import { LanguageService } from './language.service';
import { ApiResponse } from '../models/api-response.model';
import { GalleryItem } from '../models/gallery.model';

@Injectable({
  providedIn: 'root'
})
export class GalleryService {
  private http = inject(HttpClient);
  private langService = inject(LanguageService);
  private baseUrl = `${environment.apiUrl}/gallery`;

  getGallery(): Observable<ApiResponse<GalleryItem[]>> {
    const params = new HttpParams().set('lang', this.langService.currentLang());
    return this.http.get<ApiResponse<GalleryItem[]>>(this.baseUrl, { params });
  }
}