import { Component, inject, signal, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormBuilder, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';
import { LanguageService } from '../../core/services/language.service';
import { SettingService } from '../../core/services/setting.service';
import { EnquiryService } from '../../core/services/enquiry.service';
import { SiteSettings } from '../../core/models/setting.model';

@Component({
  selector: 'app-contact',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './contact.component.html'
})
export class ContactComponent implements OnInit {
  langService = inject(LanguageService);
  private fb = inject(FormBuilder);
  private settingService = inject(SettingService);
  private enquiryService = inject(EnquiryService);
  private sanitizer = inject(DomSanitizer);

  settings = signal<SiteSettings | null>(null);

  enquiryForm: FormGroup = this.fb.group({
    name: ['', [Validators.required]],
    email: ['', [Validators.required, Validators.email]],
    phone: [''],
    subject: [''],
    message: ['', [Validators.required]]
  });

  isSubmitting = signal(false);
  submitSuccess = signal(false);
  submitError = signal(false);
  submitErrorMessage = signal('');
  formSubmitted = signal(false);

  ngOnInit() {
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.settings.set(res.data);
        }
      },
      error: () => {}
    });
  }

  getGoogleMapsEmbedUrl(): SafeResourceUrl {
    const rawAddress = this.settings()?.site?.address || 'Visawa Agro Tourism – Babacha Mala, Maharashtra, India';
    const query = encodeURIComponent(rawAddress);
    const embedUrl = `https://maps.google.com/maps?q=${query}&t=&z=14&ie=UTF8&iwloc=&output=embed`;
    return this.sanitizer.bypassSecurityTrustResourceUrl(embedUrl);
  }

  getDirectionsUrl(): string {
    const rawAddress = this.settings()?.site?.address || 'Visawa Agro Tourism – Babacha Mala, Maharashtra, India';
    return `https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(rawAddress)}`;
  }

  getWhatsAppUrl(): string {
    const phone = this.settings()?.site?.phone || '+919876543210';
    const cleanPhone = phone.replace(/[^0-9]/g, '');
    const isMr = this.langService.isMarathi();
    const msg = isMr
      ? 'नमस्कार! मी विसावा ॲग्रो टुरिझम – बाबांचा मळा येथे भेट देण्याबाबत चौकशी करू इच्छितो.'
      : 'Hello! I would like to inquire about visiting Visawa Agro Tourism – Babacha Mala.';
    return `https://wa.me/${cleanPhone}?text=${encodeURIComponent(msg)}`;
  }

  submitEnquiry() {
    this.formSubmitted.set(true);
    if (this.enquiryForm.invalid) return;

    this.isSubmitting.set(true);
    this.submitError.set(false);

    this.enquiryService.submitEnquiry(this.enquiryForm.value).subscribe({
      next: (res) => {
        this.isSubmitting.set(false);
        if (res.success) {
          this.submitSuccess.set(true);
          this.enquiryForm.reset();
          this.formSubmitted.set(false);
        } else {
          this.submitError.set(true);
          this.submitErrorMessage.set(res.message);
        }
      },
      error: (err) => {
        this.isSubmitting.set(false);
        this.submitError.set(true);
        this.submitErrorMessage.set(err.error?.message || 'Submission failed');
      }
    });
  }
}