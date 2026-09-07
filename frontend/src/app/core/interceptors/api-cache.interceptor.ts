import { HttpInterceptorFn, HttpResponse, HttpEvent } from '@angular/common/http';
import { inject } from '@angular/core';
import { of, Observable } from 'rxjs';
import { tap, shareReplay, finalize } from 'rxjs/operators';
import { ApiCacheService } from '../services/api-cache.service';

export const apiCacheInterceptor: HttpInterceptorFn = (req, next): Observable<HttpEvent<unknown>> => {
  // Only cache GET requests destined for the API
  if (req.method !== 'GET' || !req.url.includes('/api/')) {
    return next(req);
  }

  // Never cache enquiry or form endpoints
  if (req.url.includes('/enquiries') || req.headers.has('X-Skip-Cache')) {
    return next(req);
  }

  const cacheService = inject(ApiCacheService);
  const cacheKey = `${req.method}::${req.urlWithParams}`;

  const cached = cacheService.get(cacheKey, true);

  // Stale-While-Revalidate Strategy:
  if (cached) {
    const cachedResponse = new HttpResponse({
      body: cached.data,
      status: cached.status,
      statusText: cached.statusText,
      url: cached.url
    });

    const isExpired = cacheService.isExpired(cached);

    // If cache is not expired, return cached response immediately
    if (!isExpired) {
      return of(cachedResponse);
    }

    // If cache is expired (stale), trigger a background network revalidation
    // without blocking the immediate return of stale data
    let inFlight = cacheService.getInFlight(cacheKey);
    if (!inFlight) {
      const request$ = next(req).pipe(
        tap(event => {
          if (event instanceof HttpResponse && event.status >= 200 && event.status < 300) {
            cacheService.set(cacheKey, event);
          }
        }),
        finalize(() => {
          cacheService.clearInFlight(cacheKey);
        }),
        shareReplay(1)
      );
      cacheService.setInFlight(cacheKey, request$);
      inFlight = request$;
    }

    // Subscribe to background revalidation to ensure it executes
    inFlight.subscribe({
      next: () => {},
      error: () => {}
    });

    // Return the cached response immediately for 0ms render
    return of(cachedResponse);
  }

  // If no cache, perform request with in-flight deduplication
  let inFlight = cacheService.getInFlight(cacheKey);
  if (!inFlight) {
    const request$ = next(req).pipe(
      tap(event => {
        if (event instanceof HttpResponse && event.status >= 200 && event.status < 300) {
          cacheService.set(cacheKey, event);
        }
      }),
      finalize(() => {
        cacheService.clearInFlight(cacheKey);
      }),
      shareReplay(1)
    );
    cacheService.setInFlight(cacheKey, request$);
    inFlight = request$;
  }

  return inFlight;
};

