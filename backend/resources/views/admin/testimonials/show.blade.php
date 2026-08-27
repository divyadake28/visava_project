@extends('admin.layouts.app')

@section('breadcrumb', 'Testimonials / View')
@section('header', 'Testimonial Details')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-lg font-bold text-slate-900">{{ $testimonial->client_name ?? $testimonial->name }}</h2>
            <div class="flex items-center gap-2 text-xs text-slate-500 mt-0.5">
                <span>{{ $testimonial->client_designation_mr ?? $testimonial->client_designation_en ?? $testimonial->designation }}</span>
                <span class="text-slate-300">|</span>
                <span class="inline-flex items-center gap-1 font-bold text-slate-900">
                    <svg class="w-3.5 h-3.5 text-amber-500 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <span>{{ number_format($testimonial->rating, 1) }}</span>
                    <span class="text-xs text-slate-400 font-normal">/ 5</span>
                </span>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="px-3 py-1.5 bg-amber-600 text-white text-xs font-semibold rounded-lg hover:bg-amber-700">Edit</a>
            <a href="{{ route('admin.testimonials.index') }}" class="px-3 py-1.5 border border-slate-300 text-slate-700 text-xs font-semibold rounded-lg hover:bg-slate-50">Back</a>
        </div>
    </div>

    <div class="space-y-4">
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
            <span class="text-xs font-bold text-amber-700 uppercase tracking-wider block mb-1">मराठी प्रतिक्रिया</span>
            <p class="text-sm text-slate-700 leading-relaxed">{{ $testimonial->review_mr ?? $testimonial->comment }}</p>
        </div>

        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider block mb-1">English Review</span>
            <p class="text-sm text-slate-700 leading-relaxed">{{ $testimonial->review_en ?? '(No English review)' }}</p>
        </div>
    </div>
</div>
@endsection
