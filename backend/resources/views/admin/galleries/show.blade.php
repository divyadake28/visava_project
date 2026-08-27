@extends('admin.layouts.app')

@section('breadcrumb', 'Galleries / View')
@section('header', 'Gallery Photo View')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-lg font-bold text-slate-900">{{ $gallery->title_mr ?? $gallery->title_en ?? 'Photo' }}</h2>
            <span class="text-xs text-slate-500">Category: {{ $gallery->category_mr ?? $gallery->category_en ?? 'General' }}</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="px-3 py-1.5 bg-emerald-600 text-white text-xs font-semibold rounded-lg hover:bg-emerald-700">Edit</a>
            <a href="{{ route('admin.galleries.index') }}" class="px-3 py-1.5 border border-slate-300 text-slate-700 text-xs font-semibold rounded-lg hover:bg-slate-50">Back</a>
        </div>
    </div>

    <div class="rounded-xl overflow-hidden bg-slate-100 flex items-center justify-center">
        <img src="{{ app(\App\Services\FileUploadService::class)->url($gallery->image ?? $gallery->image_path) }}" alt="Gallery" class="w-full h-auto max-h-96 object-contain">
    </div>
</div>
@endsection
