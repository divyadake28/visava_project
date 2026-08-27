@extends('admin.layouts.app')

@section('breadcrumb', 'Events / View')
@section('header', 'Event Details')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-lg font-bold text-slate-900">{{ $event->title_mr ?? $event->title_en }}</h2>
            <p class="text-xs text-slate-500 mt-0.5">Date: {{ ($event->event_date ?? $event->start_date)?->format('M d, Y H:i') }} | Location: {{ $event->location_mr ?? $event->location_en ?? 'Resort' }}</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.events.edit', $event) }}" class="px-3 py-1.5 bg-indigo-600 text-white text-xs font-semibold rounded-lg hover:bg-indigo-700">Edit</a>
            <a href="{{ route('admin.events.index') }}" class="px-3 py-1.5 border border-slate-300 text-slate-700 text-xs font-semibold rounded-lg hover:bg-slate-50">Back</a>
        </div>
    </div>

    @if ($event->image || $event->banner_image)
        <div class="rounded-xl overflow-hidden max-h-80 bg-slate-100 flex items-center justify-center">
            <img src="{{ app(\App\Services\FileUploadService::class)->url($event->image ?? $event->banner_image) }}" alt="Event Banner" class="object-cover w-full h-full">
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
            <span class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-2">मराठी माहिती</span>
            <h3 class="font-bold text-slate-900 text-base mb-1">{{ $event->title_mr }}</h3>
            <p class="text-xs text-slate-600 mb-3 font-medium">{{ $event->short_description_mr }}</p>
            <div class="text-xs text-slate-700 whitespace-pre-line leading-relaxed">{{ $event->description_mr }}</div>
        </div>

        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider block mb-2">English Details</span>
            <h3 class="font-bold text-slate-900 text-base mb-1">{{ $event->title_en ?? '(Not set)' }}</h3>
            <p class="text-xs text-slate-600 mb-3 font-medium">{{ $event->short_description_en }}</p>
            <div class="text-xs text-slate-700 whitespace-pre-line leading-relaxed">{{ $event->description_en ?? '(No English text)' }}</div>
        </div>
    </div>
</div>
@endsection
