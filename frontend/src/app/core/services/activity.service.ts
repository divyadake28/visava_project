import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';
import { LanguageService } from './language.service';
import { ApiResponse } from '../models/api-response.model';
import { Activity } from '../models/activity.model';

@Injectable({
  providedIn: 'root'
})
export class ActivityService {
  private http = inject(HttpClient);
  private langService = inject(LanguageService);
  private baseUrl = `${environment.apiUrl}/activities`;

  getActivities(lang?: string): Observable<ApiResponse<Activity[]>> {
    const selectedLang = lang || this.langService.currentLang();
    const params = new HttpParams().set('lang', selectedLang);
    return this.http.get<ApiResponse<Activity[]>>(this.baseUrl, { params });
  }

  getActivityById(id: number, lang?: string): Observable<ApiResponse<Activity>> {
    const selectedLang = lang || this.langService.currentLang();
    const params = new HttpParams().set('lang', selectedLang);
    return this.http.get<ApiResponse<Activity>>(`${this.baseUrl}/${id}`, { params });
  }
}