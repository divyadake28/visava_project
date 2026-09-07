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
    const embedUrl = `https://maps.google.com/maps?q=19.8854008,75.2079868+(Visawa+Agro+Tourism+%E2%80%93+Babacha+Mala)&t=&z=15&ie=UTF8&iwloc=&output=embed`;
    return this.sanitizer.bypassSecurityTrustResourceUrl(embedUrl);
  }

  getDirectionsUrl(): string {
    return `https://www.google.com/maps/place/Visawa+Agro+Tourism+Babacha+Mala/@19.8854008,75.2079868,656m/data=!3m2!1e3!4b1!4m6!3m5!1s0x3bdb9ba9bea86c1b:0x9e599923d483e0fb!8m2!3d19.8854008!4d75.2079868!16s%2Fg%2F11nvgsrrzz`;
  }

  getWhatsAppUrl(): string {
    const phone = this.settings()?.site?.phone || '+919158141414';
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

    const formValues = { ...this.enquiryForm.value };
    this.isSubmitting.set(true);
    this.submitError.set(false);

    this.enquiryService.submitEnquiry(formValues).subscribe({
      next: (res) => {
        this.isSubmitting.set(false);
        if (res.success) {
          this.submitSuccess.set(true);

          // Language Detection (localStorage or LanguageService)
          const selectedLang = (typeof window !== 'undefined' ? localStorage.getItem('selectedLanguage') : null) || this.langService.currentLang();
          const isMarathi = selectedLang === 'mr';

          // Owner WhatsApp Number
          const rawPhone = (res as any)?.whatsapp?.owner_number 
            || this.settings()?.site?.whatsapp_owner_number 
            || '919158141414';
          const cleanPhone = rawPhone.replace(/[^0-9]/g, '');
          const ownerNumber = cleanPhone.length === 10 ? `91${cleanPhone}` : (cleanPhone || '919158141414');

          // Build Exact Formatted Message
          const custName = (formValues.name || '').trim() || '-';
          const custPhone = (formValues.phone || '').trim() || '-';
          const custEmail = (formValues.email || '').trim() || '-';
          const custSubject = (formValues.subject || '').trim() || (isMarathi ? 'सामान्य चौकशी' : 'General Enquiry');
          const custMessage = (formValues.message || '').trim() || '-';

          let waMessage = '';
          if (isMarathi) {
            waMessage = `*विसावा कृषी पर्यटन व रिसॉर्ट*\n\n` +
              `*नवीन चौकशी*\n\n` +
              `*ग्राहकाचे नाव:* ${custName}\n` +
              `*मोबाईल क्रमांक:* ${custPhone}\n` +
              `*ईमेल:* ${custEmail}\n` +
              `*भेटीचा उद्देश:* ${custSubject}\n\n` +
              `*चौकशीचा तपशील:*\n` +
              `${custMessage}\n\n` +
              `*धन्यवाद.*`;
          } else {
            waMessage = `*VISAWA AGRO TOURISM & RESORT*\n\n` +
              `*A New Enquiry Has Been Received*\n\n` +
              `*Customer Name:* ${custName}\n` +
              `*Mobile Number:* ${custPhone}\n` +
              `*Email Address:* ${custEmail}\n` +
              `*Purpose of Visit:* ${custSubject}\n\n` +
              `*Enquiry Details:*\n` +
              `${custMessage}\n\n` +
              `*Thank You.*`;
          }

          // Open WhatsApp chat in a new tab
          const whatsappUrl = `https://wa.me/${ownerNumber}?text=${encodeURIComponent(waMessage)}`;
          try {
            window.open(whatsappUrl, '_blank');
          } catch (e) {
            console.error('WhatsApp open error:', e);
          }

          // Reset form and keep success state
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