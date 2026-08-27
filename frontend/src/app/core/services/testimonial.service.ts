import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';
import { LanguageService } from './language.service';
import { ApiResponse } from '../models/api-response.model';
import { Testimonial } from '../models/testimonial.model';

@Injectable({
  providedIn: 'root'
})
export class TestimonialService {
  private http = inject(HttpClient);
  private langService = inject(LanguageService);
  private baseUrl = `${environment.apiUrl}/testimonials`;

  getTestimonials(): Observable<ApiResponse<Testimonial[]>> {
    const params = new HttpParams().set('lang', this.langService.currentLang());
    return this.http.get<ApiResponse<Testimonial[]>>(this.baseUrl, { params });
  }
}