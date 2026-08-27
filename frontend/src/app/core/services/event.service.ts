import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';
import { LanguageService } from './language.service';
import { ApiResponse } from '../models/api-response.model';
import { EventItem } from '../models/event.model';

@Injectable({
  providedIn: 'root'
})
export class EventService {
  private http = inject(HttpClient);
  private langService = inject(LanguageService);
  private baseUrl = `${environment.apiUrl}/events`;

  getEvents(): Observable<ApiResponse<EventItem[]>> {
    const params = new HttpParams().set('lang', this.langService.currentLang());
    return this.http.get<ApiResponse<EventItem[]>>(this.baseUrl, { params });
  }

  getEventBySlug(slug: string): Observable<ApiResponse<EventItem>> {
    const params = new HttpParams().set('lang', this.langService.currentLang());
    return this.http.get<ApiResponse<EventItem>>(`${this.baseUrl}/${slug}`, { params });
  }
}