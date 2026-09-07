@extends('admin.layouts.app')

@section('breadcrumb', 'Blogs / View')
@section('header', 'Blog Details')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-lg font-bold text-slate-900">{{ $blog->title_mr ?? $blog->title_en }}</h2>
            <span class="badge {{ $blog->status === 'active' ? 'badge-published' : 'badge-draft' }} mt-1">{{ ucfirst($blog->status) }}</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.blogs.edit', $blog) }}" class="px-3 py-1.5 bg-blue-600 text-white text-xs font-semibold rounded-lg hover:bg-blue-700">Edit</a>
            <a href="{{ route('admin.blogs.index') }}" class="px-3 py-1.5 border border-slate-300 text-slate-700 text-xs font-semibold rounded-lg hover:bg-slate-50">Back</a>
        </div>
    </div>

    @if ($blog->featured_image)
        <div class="rounded-xl overflow-hidden max-h-80 bg-slate-100 flex items-center justify-center">
            <img src="{{ app(\App\Services\FileUploadService::class)->url($blog->featured_image) }}" alt="Featured" class="object-cover w-full h-full">
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
            <span class="text-xs font-bold text-blue-700 uppercase tracking-wider block mb-2">मराठी माहिती (Marathi)</span>
            <h3 class="font-bold text-slate-900 text-base mb-1">{{ $blog->title_mr }}</h3>
            <p class="text-xs text-slate-600 font-medium mb-3">{{ $blog->short_description_mr }}</p>
            <div class="text-xs text-slate-700 whitespace-pre-line leading-relaxed">{{ $blog->description_mr }}</div>
        </div>

        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider block mb-2">English Content</span>
            <h3 class="font-bold text-slate-900 text-base mb-1">{{ $blog->title_en ?? '(Not set)' }}</h3>
            <p class="text-xs text-slate-600 font-medium mb-3">{{ $blog->short_description_en }}</p>
            <div class="text-xs text-slate-700 whitespace-pre-line leading-relaxed">{{ $blog->description_en ?? '(No English text)' }}</div>
        </div>
    </div>

    @if ($blog->blog_video || $blog->youtube_url || $blog->instagram_url)
        <div class="p-4 bg-blue-50/50 rounded-xl border border-blue-100 space-y-3">
            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider block">Media & Integrations</span>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
                @if ($blog->blog_video)
                    <div class="p-3 bg-white rounded-lg border border-slate-200">
                        <span class="font-bold text-emerald-700 block mb-1">🎥 Uploaded Video</span>
                        <a href="{{ app(\App\Services\FileUploadService::class)->url($blog->blog_video) }}" target="_blank" class="text-blue-600 underline">View Video File &rarr;</a>
                    </div>
                @endif
                @if ($blog->youtube_url)
                    <div class="p-3 bg-white rounded-lg border border-slate-200">
                        <span class="font-bold text-red-600 block mb-1">▶ YouTube Link</span>
                        <a href="{{ $blog->youtube_url }}" target="_blank" class="text-blue-600 underline truncate block">{{ $blog->youtube_url }}</a>
                    </div>
                @endif
                @if ($blog->instagram_url)
                    <div class="p-3 bg-white rounded-lg border border-slate-200">
                        <span class="font-bold text-pink-600 block mb-1">📸 Instagram Link</span>
                        <a href="{{ $blog->instagram_url }}" target="_blank" class="text-blue-600 underline truncate block">{{ $blog->instagram_url }}</a>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection
