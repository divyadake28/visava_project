import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';
import { LanguageService } from './language.service';
import { ApiResponse } from '../models/api-response.model';
import { DiningItem } from '../models/dining.model';

@Injectable({
  providedIn: 'root'
})
export class DiningService {
  private http = inject(HttpClient);
  private langService = inject(LanguageService);
  private baseUrl = `${environment.apiUrl}/dining`;

  getDiningItems(category?: string, lang?: string): Observable<ApiResponse<DiningItem[]>> {
    const selectedLang = lang || this.langService.currentLang();
    let params = new HttpParams().set('lang', selectedLang);
    if (category && category !== 'all') {
      params = params.set('category', category);
    }
    return this.http.get<ApiResponse<DiningItem[]>>(this.baseUrl, { params });
  }

  getDiningItemById(id: number, lang?: string): Observable<ApiResponse<DiningItem>> {
    const selectedLang = lang || this.langService.currentLang();
    const params = new HttpParams().set('lang', selectedLang);
    return this.http.get<ApiResponse<DiningItem>>(`${this.baseUrl}/${id}`, { params });
  }
}
