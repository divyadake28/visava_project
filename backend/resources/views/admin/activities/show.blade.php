@extends('admin.layouts.app')

@section('breadcrumb', 'Experiences & Activities / View')
@section('header', 'Activity Details')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Activity #{{ $activity->id }}</span>
                <h2 class="text-xl font-bold text-slate-900 mt-1">{{ $activity->title_en ?: $activity->title_mr }}</h2>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.activities.edit', $activity) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-sm transition">Edit</a>
                <a href="{{ route('admin.activities.index') }}" class="px-4 py-2 border border-slate-300 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-50">Back</a>
            </div>
        </div>

        @if($activity->image)
            <div class="rounded-2xl overflow-hidden border border-slate-200 max-h-80 bg-slate-900">
                <img src="{{ app(\App\Services\FileUploadService::class)->url($activity->image) }}" alt="{{ $activity->title_en }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100">
            <div>
                <span class="text-[11px] text-slate-500 font-bold uppercase block">Status</span>
                <span class="badge {{ $activity->is_active ? 'badge-active' : 'badge-inactive' }} mt-1">
                    {{ $activity->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div>
                <span class="text-[11px] text-slate-500 font-bold uppercase block">Sort Order</span>
                <span class="text-sm font-bold text-slate-900 mt-1 block">{{ $activity->sort_order }}</span>
            </div>
            <div>
                <span class="text-[11px] text-slate-500 font-bold uppercase block">Icon / Emoji</span>
                <span class="text-base font-bold text-slate-900 mt-1 block">{{ $activity->icon ?: '—' }}</span>
            </div>
            <div>
                <span class="text-[11px] text-slate-500 font-bold uppercase block">Created</span>
                <span class="text-xs text-slate-600 mt-1 block">{{ $activity->created_at?->format('d M Y') }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
            <!-- Marathi Information -->
            <div class="space-y-4 p-5 bg-slate-50/60 rounded-2xl border border-slate-200/80">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-100 text-amber-900 text-xs font-bold rounded-full">
                    मराठी माहिती (Marathi)
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase">शीर्षक (Title)</h3>
                    <p class="text-sm font-semibold text-slate-900 mt-1">{{ $activity->title_mr ?: '—' }}</p>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase">संक्षिप्त वर्णन (Short Description)</h3>
                    <p class="text-xs text-slate-700 mt-1 leading-relaxed">{{ $activity->short_description_mr ?: '—' }}</p>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase">सविस्तर तपशील (Full Description)</h3>
                    <p class="text-xs text-slate-700 mt-1 leading-relaxed whitespace-pre-line">{{ $activity->description_mr ?: '—' }}</p>
                </div>
            </div>

            <!-- English Information -->
            <div class="space-y-4 p-5 bg-slate-50/60 rounded-2xl border border-slate-200/80">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-100 text-blue-900 text-xs font-bold rounded-full">
                    English Content
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase">Title</h3>
                    <p class="text-sm font-semibold text-slate-900 mt-1">{{ $activity->title_en ?: '—' }}</p>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase">Short Description</h3>
                    <p class="text-xs text-slate-700 mt-1 leading-relaxed">{{ $activity->short_description_en ?: '—' }}</p>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase">Full Description</h3>
                    <p class="text-xs text-slate-700 mt-1 leading-relaxed whitespace-pre-line">{{ $activity->description_en ?: '—' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection