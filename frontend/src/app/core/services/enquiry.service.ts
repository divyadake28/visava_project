import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';
import { LanguageService } from './language.service';
import { ApiResponse } from '../models/api-response.model';
import { EnquiryPayload, EnquiryResponse } from '../models/enquiry.model';

@Injectable({
  providedIn: 'root'
})
export class EnquiryService {
  private http = inject(HttpClient);
  private langService = inject(LanguageService);
  private baseUrl = `${environment.apiUrl}/enquiries`;

  submitEnquiry(payload: EnquiryPayload): Observable<ApiResponse<EnquiryResponse>> {
    const params = new HttpParams().set('lang', this.langService.currentLang());
    return this.http.post<ApiResponse<EnquiryResponse>>(this.baseUrl, payload, { params });
  }
}