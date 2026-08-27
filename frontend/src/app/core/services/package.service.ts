import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';
import { LanguageService } from './language.service';
import { ApiResponse } from '../models/api-response.model';
import { Package } from '../models/package.model';

@Injectable({
  providedIn: 'root'
})
export class PackageService {
  private http = inject(HttpClient);
  private langService = inject(LanguageService);
  private baseUrl = `${environment.apiUrl}/packages`;

  getPackages(): Observable<ApiResponse<Package[]>> {
    const params = new HttpParams().set('lang', this.langService.currentLang());
    return this.http.get<ApiResponse<Package[]>>(this.baseUrl, { params });
  }

  getPackageBySlug(slug: string): Observable<ApiResponse<Package>> {
    const params = new HttpParams().set('lang', this.langService.currentLang());
    return this.http.get<ApiResponse<Package>>(`${this.baseUrl}/${slug}`, { params });
  }
}