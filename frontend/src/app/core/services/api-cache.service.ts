import { Injectable } from '@angular/core';
import { HttpResponse, HttpEvent } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface CacheEntry<T = any> {
  data: T;
  timestamp: number;
  expiresAt: number;
  status: number;
  statusText: string;
  url: string;
}

@Injectable({
  providedIn: 'root'
})
export class ApiCacheService {
  private memoryCache = new Map<string, CacheEntry>();
  private inFlightRequests = new Map<string, Observable<HttpEvent<any>>>();
  private readonly STORAGE_KEY_PREFIX = 'visava_cache_';
  private readonly STORAGE_INDEX_KEY = 'visava_cache_keys';

  // Short TTLs (in milliseconds) to ensure changes from Laravel Admin reflect quickly
  private readonly TTL_CONFIG: Record<string, number> = {
    '/settings': 10 * 1000,      // 10 seconds
    '/packages': 10 * 1000,      // 10 seconds
    '/activities': 10 * 1000,    // 10 seconds
    '/events': 10 * 1000,        // 10 seconds
    '/testimonials': 10 * 1000,  // 10 seconds
    '/gallery': 10 * 1000,       // 10 seconds
    '/blogs': 10 * 1000,         // 10 seconds
  };
  private readonly DEFAULT_TTL = 10 * 1000; // 10 seconds default

  constructor() {
    // Clear all previous stale caches on init so updates immediately show
    this.clear();
  }

  getTtlForUrl(url: string): number {
    for (const [endpoint, ttl] of Object.entries(this.TTL_CONFIG)) {
      if (url.includes(endpoint)) {
        return ttl;
      }
    }
    return this.DEFAULT_TTL;
  }

  get(key: string): CacheEntry | null {
    // 1. Check memory cache
    if (this.memoryCache.has(key)) {
      const entry = this.memoryCache.get(key)!;
      if (!this.isExpired(entry)) {
        return entry;
      }
      this.memoryCache.delete(key);
    }

    // 2. Check localStorage
    try {
      if (typeof window !== 'undefined' && window.localStorage) {
        const raw = localStorage.getItem(this.STORAGE_KEY_PREFIX + key);
        if (raw) {
          const parsed: CacheEntry = JSON.parse(raw);
          if (!this.isExpired(parsed)) {
            this.memoryCache.set(key, parsed);
            return parsed;
          }
          localStorage.removeItem(this.STORAGE_KEY_PREFIX + key);
        }
      }
    } catch {}

    return null;
  }

  set(key: string, response: HttpResponse<any>, customTtl?: number): void {
    const ttl = customTtl ?? this.getTtlForUrl(response.url || key);
    const now = Date.now();
    const entry: CacheEntry = {
      data: response.body,
      timestamp: now,
      expiresAt: now + ttl,
      status: response.status,
      statusText: response.statusText,
      url: response.url || key
    };

    // Save to memory
    this.memoryCache.set(key, entry);

    // Save to localStorage
    try {
      if (typeof window !== 'undefined' && window.localStorage) {
        localStorage.setItem(this.STORAGE_KEY_PREFIX + key, JSON.stringify(entry));
        this.trackKey(key);
      }
    } catch {
      this.purgeExpired();
    }
  }

  isExpired(entry: CacheEntry): boolean {
    return Date.now() > entry.expiresAt;
  }

  getInFlight(key: string): Observable<HttpEvent<any>> | null {
    return this.inFlightRequests.get(key) || null;
  }

  setInFlight(key: string, request$: Observable<HttpEvent<any>>): void {
    this.inFlightRequests.set(key, request$);
  }

  clearInFlight(key: string): void {
    this.inFlightRequests.delete(key);
  }

  clear(prefix?: string): void {
    this.memoryCache.clear();
    this.inFlightRequests.clear();

    try {
      if (typeof window !== 'undefined' && window.localStorage) {
        const keys = this.getTrackedKeys();
        keys.forEach(k => {
          if (!prefix || k.includes(prefix)) {
            localStorage.removeItem(this.STORAGE_KEY_PREFIX + k);
          }
        });
        
        // Also scan and remove all keys with STORAGE_KEY_PREFIX
        const allKeys = Object.keys(localStorage);
        for (const k of allKeys) {
          if (k.startsWith(this.STORAGE_KEY_PREFIX)) {
            localStorage.removeItem(k);
          }
        }

        if (!prefix) {
          localStorage.removeItem(this.STORAGE_INDEX_KEY);
        }
      }
    } catch {}
  }

  private trackKey(key: string) {
    try {
      const keys = this.getTrackedKeys();
      if (!keys.includes(key)) {
        keys.push(key);
        localStorage.setItem(this.STORAGE_INDEX_KEY, JSON.stringify(keys));
      }
    } catch {}
  }

  private getTrackedKeys(): string[] {
    try {
      const raw = localStorage.getItem(this.STORAGE_INDEX_KEY);
      return raw ? JSON.parse(raw) : [];
    } catch {
      return [];
    }
  }

  private purgeExpired(): void {
    try {
      if (typeof window === 'undefined' || !window.localStorage) return;
      const keys = this.getTrackedKeys();
      const now = Date.now();
      const survivingKeys: string[] = [];

      for (const key of keys) {
        const raw = localStorage.getItem(this.STORAGE_KEY_PREFIX + key);
        if (raw) {
          try {
            const entry: CacheEntry = JSON.parse(raw);
            if (now > entry.expiresAt) {
              localStorage.removeItem(this.STORAGE_KEY_PREFIX + key);
              this.memoryCache.delete(key);
            } else {
              survivingKeys.push(key);
            }
          } catch {
            localStorage.removeItem(this.STORAGE_KEY_PREFIX + key);
          }
        }
      }

      localStorage.setItem(this.STORAGE_INDEX_KEY, JSON.stringify(survivingKeys));
    } catch {}
  }
}
