# Visava Tourism & Resort Management System - REST API Documentation

Complete REST API specification and Angular integration reference for the Visava Resort backend.

---

## 1. Overview & Base URL

- **Protocol**: HTTP / HTTPS
- **Data Format**: JSON (`application/json`)
- **Default Localization**: **Marathi (`mr`)**
- **Secondary Localization**: **English (`en`)**
- **Base URL (Local Development)**: `http://127.0.0.1:8000/api/v1`
- **Health Check Endpoint**: `http://127.0.0.1:8000/api/health`

---

## 2. Global Headers & Query Parameters

### Required Headers
```http
Accept: application/json
Content-Type: application/json
```

### Language Parameter (`?lang=`)
All `GET` and `POST` endpoints accept an optional `lang` query parameter:
- `?lang=mr` (Default if omitted): Returns localized content in Marathi.
- `?lang=en`: Returns localized content in English.

### Symmetrical Language Fallback Behavior
- If `?lang=mr` is requested and the Marathi field is empty, the API automatically falls back to the English content.
- If `?lang=en` is requested and the English field is empty, the API automatically falls back to the Marathi content.
- In all responses, both raw fields (e.g. `title_mr`, `title_en`) and the resolved localized field (e.g. `title`) are provided.

---

## 3. Standard Response Formats

### Standard Success Response (200 OK / 201 Created)
```json
{
  "success": true,
  "message": "पॅकेजेस यशस्वीरीत्या आणले गेले",
  "language": "mr",
  "data": [ ... ]
}
```

### Resource Not Found Response (404 Not Found)
```json
{
  "success": false,
  "message": "ब्लॉग सापडला नाही",
  "language": "mr",
  "data": null
}
```

### Validation Error Response (422 Unprocessable Entity)
```json
{
  "message": "The name field is required. (and 2 more errors)",
  "errors": {
    "name": ["The name field is required."],
    "email": ["The email field is required."],
    "message": ["The message field is required."]
  }
}
```

---

## 4. API Endpoints Catalog

| Method | Endpoint | Description | Auth Required |
|---|---|---|---|
| `GET` | `/api/health` | System health and environment check | No |
| `GET` | `/api/v1/packages` | List active tour & stay packages | No |
| `GET` | `/api/v1/packages/{slug}` | Single package details | No |
| `GET` | `/api/v1/activities` | List active experiences & resort activities | No |
| `GET` | `/api/v1/activities/{id}` | Single activity / experience details | No |
| `GET` | `/api/v1/events` | List active resort events | No |
| `GET` | `/api/v1/events/{slug}` | Single event details | No |
| `GET` | `/api/v1/blogs` | List published blog articles | No |
| `GET` | `/api/v1/blogs/{slug}` | Single blog article details | No |
| `GET` | `/api/v1/gallery` | List active photo gallery images | No |
| `GET` | `/api/v1/testimonials` | List approved guest testimonials | No |
| `POST` | `/api/v1/enquiries` | Submit a customer inquiry / lead | No |
| `GET` | `/api/v1/settings` | Global settings, SEO & Homepage CMS | No |

---

## 5. Detailed Endpoint Specifications & Examples

### 5.1 System Health Check
`GET /api/health`

#### Example Request
```bash
curl -X GET http://127.0.0.1:8000/api/health \
  -H "Accept: application/json"
```

#### Example Response
```json
{
  "status": "ok",
  "app": "Visava",
  "environment": "local",
  "timestamp": "2026-08-25T12:20:00+05:30"
}
```

---

### 5.2 Tour Packages

#### List All Active Packages
`GET /api/v1/packages?lang=mr`

```bash
curl -X GET "http://127.0.0.1:8000/api/v1/packages?lang=mr" \
  -H "Accept: application/json"
```

#### Response Example
```json
{
  "success": true,
  "message": "पॅकेजेस यशस्वीरीत्या आणले गेले",
  "language": "mr",
  "data": [
    {
      "id": 1,
      "title": "कौटुंबिक वीकेंड स्टे पॅकेज (२ रात्री / ३ दिवस)",
      "title_mr": "कौटुंबिक वीकेंड स्टे पॅकेज (२ रात्री / ३ दिवस)",
      "title_en": "Family Weekend Stay Package (2N / 3D)",
      "slug": "family-weekend-stay-package",
      "duration": "३ दिवस / २ रात्री",
      "duration_mr": "३ दिवस / २ रात्री",
      "duration_en": "3 Days / 2 Nights",
      "price": 7999.0,
      "discounted_price": null,
      "short_description": "वॉटर पार्क प्रवेश, सर्व जेवण आणि डिलक्स रूम स्टे सह.",
      "short_description_mr": "वॉटर पार्क प्रवेश, सर्व जेवण आणि डिलक्स रूम स्टे सह.",
      "short_description_en": "Includes water park pass, all meals and luxury cottage stay.",
      "description": "संपूर्ण कुटुंबासाठी अम्युझमेंट राइड्स, स्विमिंग पूल, ब्युफे लंच व डिनर आणि सांस्कृतिक संध्याकाळचा आनंद घ्या.",
      "description_mr": "संपूर्ण कुटुंबासाठी अम्युझमेंट राइड्स, स्विमिंग पूल, ब्युफे लंच व डिनर आणि सांस्कृतिक संध्याकाळचा आनंद घ्या.",
      "description_en": "Enjoy amusement rides, swimming pool, buffet meals and live evening entertainment for the entire family.",
      "featured_image": "http://127.0.0.1:8000/storage/uploads/packages/sample.jpg",
      "status": "active",
      "created_at": "2026-08-25T06:00:00+00:00"
    }
  ]
}
```

#### Get Single Package by Slug
`GET /api/v1/packages/family-weekend-stay-package?lang=en`

```json
{
  "success": true,
  "message": "Package details fetched successfully",
  "language": "en",
  "data": {
    "id": 1,
    "title": "Family Weekend Stay Package (2N / 3D)",
    "slug": "family-weekend-stay-package",
    "duration": "3 Days / 2 Nights",
    "price": 7999.0,
    "short_description": "Includes water park pass, all meals and luxury cottage stay.",
    "description": "Enjoy amusement rides, swimming pool, buffet meals and live evening entertainment for the entire family.",
    "featured_image": "http://127.0.0.1:8000/storage/uploads/packages/sample.jpg",
    "status": "active"
  }
}
```

---

### 5.3 Experiences & Activities

#### List All Active Activities / Experiences
`GET /api/v1/activities?lang=mr`

```bash
curl -X GET "http://127.0.0.1:8000/api/v1/activities?lang=mr" \
  -H "Accept: application/json"
```

#### Response Example (Marathi)
```json
{
  "success": true,
  "message": "अनुभव व उपक्रम यशस्वीरित्या प्राप्त झाले",
  "language": "mr",
  "data": [
    {
      "id": 1,
      "title": "भव्य वॉटर पार्क आणि स्लाइड्स",
      "title_mr": "भव्य वॉटर पार्क आणि स्लाइड्स",
      "title_en": "Grand Water Park & Slides",
      "short_description": "अनेक प्रकारच्या आंतरराष्ट्रीय दर्जाच्या वॉटर स्लाइड्स, वेव्ह पूल आणि लेझी रिव्हर.",
      "short_description_mr": "अनेक प्रकारच्या आंतरराष्ट्रीय दर्जाच्या वॉटर स्लाइड्स, वेव्ह पूल आणि लेझी रिव्हर.",
      "short_description_en": "Multi-tier high speed water slides, artificial wave pool, and lazy river.",
      "description": "विसावा वॉटर पार्क हे संपूर्ण कुटुंबासाठी मनमुराद आनंदाचे ठिकाण आहे.",
      "description_mr": "विसावा वॉटर पार्क हे संपूर्ण कुटुंबासाठी मनमुराद आनंदाचे ठिकाण आहे.",
      "description_en": "Visava Water Park provides world-class aquatic fun with certified lifeguards.",
      "image": "http://127.0.0.1:8000/storage/uploads/activities/waterpark.jpg",
      "icon": "🌊",
      "sort_order": 1,
      "is_active": true,
      "created_at": "2026-08-25T10:00:00+00:00"
    }
  ]
}
```

#### Response Example (English Query with Language Fallback)
`GET /api/v1/activities?lang=en`

```json
{
  "success": true,
  "message": "Activities fetched successfully",
  "language": "en",
  "data": [
    {
      "id": 1,
      "title": "Grand Water Park & Slides",
      "title_mr": "भव्य वॉटर पार्क आणि स्लाइड्स",
      "title_en": "Grand Water Park & Slides",
      "short_description": "Multi-tier high speed water slides, artificial wave pool, and lazy river.",
      "short_description_mr": "अनेक प्रकारच्या आंतरराष्ट्रीय दर्जाच्या वॉटर स्लाइड्स, वेव्ह पूल आणि लेझी रिव्हर.",
      "short_description_en": "Multi-tier high speed water slides, artificial wave pool, and lazy river.",
      "description": "Visava Water Park provides world-class aquatic fun with certified lifeguards.",
      "description_mr": "विसावा वॉटर पार्क हे संपूर्ण कुटुंबासाठी मनमुराद आनंदाचे ठिकाण आहे.",
      "description_en": "Visava Water Park provides world-class aquatic fun with certified lifeguards.",
      "image": "http://127.0.0.1:8000/storage/uploads/activities/waterpark.jpg",
      "icon": "🌊",
      "sort_order": 1,
      "is_active": true,
      "created_at": "2026-08-25T10:00:00+00:00"
    }
  ]
}
```

#### Get Single Activity by ID
`GET /api/v1/activities/{id}?lang=en`

```json
{
  "success": true,
  "message": "Activity details fetched successfully",
  "language": "en",
  "data": {
    "id": 1,
    "title": "Grand Water Park & Slides",
    "title_mr": "भव्य वॉटर पार्क आणि स्लाइड्स",
    "title_en": "Grand Water Park & Slides",
    "short_description": "Multi-tier high speed water slides, artificial wave pool, and lazy river.",
    "description": "Visava Water Park provides world-class aquatic fun with certified lifeguards.",
    "image": "http://127.0.0.1:8000/storage/uploads/activities/waterpark.jpg",
    "icon": "🌊",
    "sort_order": 1,
    "is_active": true
  }
}
```

---

### 5.4 Resort Events

#### List Events
`GET /api/v1/events?lang=mr`

```json
{
  "success": true,
  "message": "इव्हेंट्स यशस्वीरीत्या आणले गेले",
  "language": "mr",
  "data": [
    {
      "id": 1,
      "title": "भव्य मान्सून वॉटर कार्निव्हल २०२६",
      "title_mr": "भव्य मान्सून वॉटर कार्निव्हल २०२६",
      "title_en": "Grand Monsoon Water Carnival 2026",
      "slug": "grand-monsoon-water-carnival",
      "location": "विसावा वॉटर पार्क एरिना",
      "location_mr": "विसावा वॉटर पार्क एरिना",
      "location_en": "Visava Water Park Arena",
      "event_date": "2026-09-09T00:00:00+00:00",
      "short_description": "डीजे म्युझिक, रेन डान्स आणि स्पेशल फूड फेस्टिव्हल.",
      "short_description_mr": "डीजे म्युझिक, रेन डान्स आणि स्पेशल फूड फेस्टिव्हल.",
      "short_description_en": "Live DJ music, rain dance party, and special food festival.",
      "description": "या पावसाळ्यात विसावा रिसॉर्टमध्ये थरारक वॉटर राइड्स, लाईव्ह म्युझिक आणि विविध खाद्यपदार्थांचा आस्वाद घ्या.",
      "description_mr": "या पावसाळ्यात विसावा रिसॉर्टमध्ये थरारक वॉटर राइड्स, लाईव्ह म्युझिक आणि विविध खाद्यपदार्थांचा आस्वाद घ्या.",
      "description_en": "Celebrate the monsoon with thrilling water slides, rain dance party, and delicious culinary delights.",
      "image": "http://127.0.0.1:8000/storage/uploads/events/carnival.jpg",
      "price": null,
      "status": "active",
      "created_at": "2026-08-25T06:00:00+00:00"
    }
  ]
}
```

---

### 5.4 Blog Articles

#### List Blogs
`GET /api/v1/blogs?lang=mr`

```json
{
  "success": true,
  "message": "ब्लॉग यशस्वीरीत्या आणले गेले",
  "language": "mr",
  "data": [
    {
      "id": 1,
      "title": "विसावा रिसॉर्टला भेट देण्यासाठी उत्तम वेळ कोणती?",
      "title_mr": "विसावा रिसॉर्टला भेट देण्यासाठी उत्तम वेळ कोणती?",
      "title_en": "Best Time to Visit Visava Amusement Park & Resort",
      "slug": "best-time-to-visit-visava",
      "short_description": "ऋतूनुसार विसावा रिसॉर्टमधील मुख्य आकर्षणे आणि प्रवासाच्या टिप्स.",
      "short_description_mr": "ऋतूनुसार विसावा रिसॉर्टमधील मुख्य आकर्षणे आणि प्रवासाच्या टिप्स.",
      "short_description_en": "Seasonal attractions and travel tips for your visit to Visava Resort.",
      "description": "विसावा रिसॉर्टमध्ये वर्षभर विविध उपक्रम सुरू असतात. पावसाळ्यात निसर्ग सौंदर्य आणि हिवाळ्यात आनंददायी वातावरण पर्यटकांना आकर्षित करते.",
      "featured_image": "http://127.0.0.1:8000/storage/uploads/blogs/travel.jpg",
      "status": "active",
      "created_at": "2026-08-25T06:00:00+00:00"
    }
  ]
}
```

---

### 5.5 Photo Gallery

#### List Gallery Photos
`GET /api/v1/gallery?lang=mr`

```json
{
  "success": true,
  "message": "गॅलरी फोटोज यशस्वीरीत्या आणले गेले",
  "language": "mr",
  "data": [
    {
      "id": 1,
      "title": "वॉटर राइड्स आणि पूल",
      "title_mr": "वॉटर राइड्स आणि पूल",
      "title_en": "Water Slides & Pool",
      "category": "वॉटर पार्क",
      "category_mr": "वॉटर पार्क",
      "category_en": "Water Park",
      "image": "http://127.0.0.1:8000/storage/uploads/galleries/pool.jpg",
      "status": "active",
      "created_at": "2026-08-25T06:00:00+00:00"
    }
  ]
}
```

---

### 5.6 Guest Testimonials

#### List Testimonials
`GET /api/v1/testimonials?lang=mr`

```json
{
  "success": true,
  "message": "प्रशंसापत्रे यशस्वीरीत्या आणली गेली",
  "language": "mr",
  "data": [
    {
      "id": 1,
      "client_name": "राहुल शर्मा",
      "client_designation": "पर्यटक, मुंबई",
      "client_designation_mr": "पर्यटक, मुंबई",
      "client_designation_en": "Tourist, Mumbai",
      "review": "विसावा रिसॉर्टमधील कौटुंबिक सहल अप्रतिम झाली! वॉटर पार्क आणि स्वादिष्ट अन्न खूप आवडले.",
      "review_mr": "विसावा रिसॉर्टमधील कौटुंबिक सहल अप्रतिम झाली! वॉटर पार्क आणि स्वादिष्ट अन्न खूप आवडले.",
      "review_en": "Wonderful family trip at Visava Resort! Loved the water slides and hygienic food.",
      "rating": 5,
      "client_image": "http://127.0.0.1:8000/storage/uploads/testimonials/avatar1.jpg",
      "status": "active",
      "created_at": "2026-08-25T06:00:00+00:00"
    }
  ]
}
```

---

### 5.7 Customer Enquiries & Booking Submissions

#### Submit New Enquiry
`POST /api/v1/enquiries?lang=mr`

#### Request Body
```json
{
  "name": "Amit Deshmukh",
  "email": "amit@example.com",
  "phone": "+91 9822001122",
  "subject": "Weekend Deluxe Cottage Booking",
  "message": "We would like to book 2 Deluxe Cottages for this Saturday. Please share availability."
}
```

#### Validation Rules
| Field | Type | Required | Constraints |
|---|---|---|---|
| `name` | string | **Yes** | Max 255 chars |
| `email` | string (email) | **Yes** | Valid email format |
| `phone` | string | Optional | Max 20 chars |
| `subject` | string | Optional | Max 255 chars |
| `message` | string | **Yes** | Minimum 1 char |

#### Success Response (201 Created)
```json
{
  "success": true,
  "message": "तुमची चौकशी यशस्वीरीत्या नोंदवली गेली. आमची टीम लवकरच आपल्याशी संपर्क करेल.",
  "language": "mr",
  "data": {
    "id": 1,
    "name": "Amit Deshmukh",
    "email": "amit@example.com",
    "phone": "+91 9822001122",
    "subject": "Weekend Deluxe Cottage Booking",
    "message": "We would like to book 2 Deluxe Cottages for this Saturday. Please share availability.",
    "status": "new",
    "created_at": "2026-08-25T12:25:00.000000Z",
    "updated_at": "2026-08-25T12:25:00.000000Z"
  }
}
```

---

### 5.8 Website Settings & Homepage CMS

#### Fetch Global CMS Data
`GET /api/v1/settings?lang=mr`

```json
{
  "success": true,
  "message": "सेटिंग्ज आणि CMS डेटा यशस्वीरीत्या आणला गेला",
  "language": "mr",
  "data": {
    "site": {
      "name": "विसावा अम्युझमेंट पार्क आणि रिसॉर्ट",
      "email": "info@visava.com",
      "phone": "+91 9876543210",
      "address": "विसावा रिसॉर्ट, निसर्गरम्य परिसर, महाराष्ट्र, भारत",
      "logo": "http://127.0.0.1:8000/storage/uploads/settings/logo.png",
      "favicon": "http://127.0.0.1:8000/storage/uploads/settings/favicon.ico"
    },
    "social": {
      "facebook": "https://facebook.com/visava",
      "instagram": "https://instagram.com/visava",
      "youtube": "https://youtube.com/@visava",
      "linkedin": "https://linkedin.com/company/visava"
    },
    "seo": {
      "meta_title": "विसावा अम्युझमेंट पार्क आणि रिसॉर्ट | सर्वोत्तम कौटुंबिक पर्यटन ठिकाण",
      "meta_description": "विसावा रिसॉर्टमध्ये वॉटर पार्क, ॲडव्हेंचर राइड्स, डिलक्स कॉटेजेस आणि स्वादिष्ट भोजनाचा आनंद घ्या.",
      "meta_keywords": "विसावा, रिसॉर्ट, अम्युझमेंट पार्क, वॉटर पार्क, पर्यटन, महाराष्ट्र रिसॉर्ट"
    },
    "homepage": {
      "hero": {
        "title": "निसर्गाच्या सानिध्यात आनंद आणि विश्रांतीचा परिपूर्ण विसावा",
        "subtitle": "कुटुंब आणि मित्रांसोबत अविस्मरणीय क्षणांचा आनंद घ्या.",
        "image": "http://127.0.0.1:8000/storage/uploads/settings/hero.jpg"
      },
      "about": {
        "title": "विसावा रिसॉर्ट बद्दल",
        "description": "विसावा हे महाराष्ट्रातील अग्रगण्य ॲम्युझमेंट आणि वॉटर पार्क रिसॉर्ट आहे, जे निसर्गरम्य वातावरणात जागतिक दर्जाच्या सुविधा पुरवते.",
        "image": "http://127.0.0.1:8000/storage/uploads/settings/about.jpg"
      },
      "why_choose_us": {
        "title": "विसावा रिसॉर्ट का निवडावे?",
        "description": "सुरक्षित राइड्स, शुद्ध व स्वादिष्ट अन्न, आलिशान खोल्या आणि उत्कृष्ट ग्राहक सेवा."
      },
      "contact_section": {
        "title": "आमच्याशी संपर्क साधा",
        "description": "बुकिंग आणि अधिक माहितीसाठी आजच आम्हाला संपर्क करा."
      }
    }
  }
}
```

---

## 6. CORS Configuration & Frontend Setup

The backend is configured in `config/cors.php` to accept cross-origin requests from the Angular development server (`http://localhost:4200`):

```php
// config/cors.php
'paths' => ['api/*', 'sanctum/csrf-cookie'],
'allowed_methods' => ['*'],
'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:4200')],
'allowed_headers' => ['*'],
'supports_credentials' => true,
```

---

## 7. Angular Integration Guide

### Step 1: Define Environment Configuration
```typescript
// src/environments/environment.ts
export const environment = {
  production: false,
  apiUrl: 'http://127.0.0.1:8000/api/v1',
  defaultLanguage: 'mr' as const // Marathi by default on first visit
};
```

### Step 2: Language State & Switcher Service
```typescript
// src/app/core/services/language.service.ts
import { Injectable, signal } from '@angular/core';

export type LanguageCode = 'mr' | 'en';

@Injectable({
  providedIn: 'root'
})
export class LanguageService {
  private readonly STORAGE_KEY = 'visava_lang';
  
  // Default to 'mr' on first visit
  readonly currentLang = signal<LanguageCode>(
    (localStorage.getItem(this.STORAGE_KEY) as LanguageCode) || 'mr'
  );

  setLanguage(lang: LanguageCode): void {
    this.currentLang.set(lang);
    localStorage.setItem(this.STORAGE_KEY, lang);
  }

  isMarathi(): boolean {
    return this.currentLang() === 'mr';
  }
}
```

### Step 3: Visava API Client Service
```typescript
// src/app/core/services/visava-api.service.ts
import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';
import { LanguageService } from './language.service';

export interface ApiResponse<T> {
  success: boolean;
  message: string;
  language: string;
  data: T;
}

export interface PackageItem {
  id: number;
  title: string;
  slug: string;
  duration: string;
  price: number;
  short_description: string;
  description: string;
  featured_image: string | null;
}

export interface EnquiryPayload {
  name: string;
  email: string;
  phone?: string;
  subject?: string;
  message: string;
}

@Injectable({
  providedIn: 'root'
})
export class VisavaApiService {
  private http = inject(HttpClient);
  private langService = inject(LanguageService);
  private baseUrl = environment.apiUrl;

  private getParams(): HttpParams {
    return new HttpParams().set('lang', this.langService.currentLang());
  }

  getPackages(): Observable<ApiResponse<PackageItem[]>> {
    return this.http.get<ApiResponse<PackageItem[]>>(`${this.baseUrl}/packages`, {
      params: this.getParams()
    });
  }

  getPackageBySlug(slug: string): Observable<ApiResponse<PackageItem>> {
    return this.http.get<ApiResponse<PackageItem>>(`${this.baseUrl}/packages/${slug}`, {
      params: this.getParams()
    });
  }

  getEvents(): Observable<ApiResponse<any[]>> {
    return this.http.get<ApiResponse<any[]>>(`${this.baseUrl}/events`, {
      params: this.getParams()
    });
  }

  getBlogs(): Observable<ApiResponse<any[]>> {
    return this.http.get<ApiResponse<any[]>>(`${this.baseUrl}/blogs`, {
      params: this.getParams()
    });
  }

  getGallery(): Observable<ApiResponse<any[]>> {
    return this.http.get<ApiResponse<any[]>>(`${this.baseUrl}/gallery`, {
      params: this.getParams()
    });
  }

  getTestimonials(): Observable<ApiResponse<any[]>> {
    return this.http.get<ApiResponse<any[]>>(`${this.baseUrl}/testimonials`, {
      params: this.getParams()
    });
  }

  getSettings(): Observable<ApiResponse<any>> {
    return this.http.get<ApiResponse<any>>(`${this.baseUrl}/settings`, {
      params: this.getParams()
    });
  }

  submitEnquiry(payload: EnquiryPayload): Observable<ApiResponse<any>> {
    return this.http.post<ApiResponse<any>>(`${this.baseUrl}/enquiries`, payload, {
      params: this.getParams()
    });
  }
}
```

### Step 4: Language Switcher Component
```typescript
// src/app/shared/components/language-switcher.component.ts
import { Component, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanguageService, LanguageCode } from '../../core/services/language.service';

@Component({
  selector: 'app-language-switcher',
  standalone: true,
  imports: [CommonModule],
  template: `
    <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-xl border border-slate-200">
      <button 
        (click)="switchLang('mr')"
        [class.bg-blue-600]="langService.currentLang() === 'mr'"
        [class.text-white]="langService.currentLang() === 'mr'"
        [class.text-slate-700]="langService.currentLang() !== 'mr'"
        class="px-3 py-1 text-xs font-bold rounded-lg transition">
        मराठी
      </button>
      <button 
        (click)="switchLang('en')"
        [class.bg-blue-600]="langService.currentLang() === 'en'"
        [class.text-white]="langService.currentLang() === 'en'"
        [class.text-slate-700]="langService.currentLang() !== 'en'"
        class="px-3 py-1 text-xs font-bold rounded-lg transition">
        English
      </button>
    </div>
  `
})
export class LanguageSwitcherComponent {
  langService = inject(LanguageService);

  switchLang(lang: LanguageCode) {
    this.langService.setLanguage(lang);
    window.location.reload(); // Or re-fetch active component data
  }
}
```