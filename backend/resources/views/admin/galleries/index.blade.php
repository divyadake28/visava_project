@extends('admin.layouts.app')

@section('breadcrumb', 'Galleries')
@section('header', 'Manage Galleries')

@section('content')
<div class="saas-card overflow-hidden space-y-0">
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
        <div>
            <h2 class="text-base font-bold text-slate-900 font-heading">Photo Galleries</h2>
            <p class="text-xs text-slate-500">Upload and organize resort highlights, rooms, dining and views</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Upload Image</span>
        </a>
    </div>

    @if ($galleries->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <p class="text-sm font-semibold text-slate-700">No photos in the gallery</p>
            <p class="text-xs text-slate-400 mt-1">Upload high-resolution photography of your property.</p>
            <a href="{{ route('admin.galleries.create') }}" class="mt-4 inline-flex items-center gap-1.5 px-4 py-2 bg-slate-900 text-white text-xs font-semibold rounded-lg hover:bg-slate-800 transition">
                + Upload Photo
            </a>
        </div>
    @else
        <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($galleries as $item)
                <div class="stat-card overflow-hidden flex flex-col justify-between">
                    <div class="h-44 bg-slate-100 flex items-center justify-center text-slate-400 relative overflow-hidden">
                        @if (!empty($item->image ?? $item->image_path))
                            <img src="{{ app(\App\Services\FileUploadService::class)->url($item->image ?? $item->image_path) }}" alt="{{ $item->title ?? 'Gallery Photo' }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        @endif
                        <span class="absolute top-2 right-2 badge {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $item->is_active ? 'Visible' : 'Hidden' }}
                        </span>
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm truncate">{{ $item->title ?? 'Untitled Image' }}</h4>
                            <p class="text-xs text-slate-500">{{ $item->category ?? 'General Gallery' }}</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-400 font-mono text-[10px]">Order: {{ $item->sort_order }}</span>
                            <div class="space-x-3">
                                <a href="{{ route('admin.galleries.edit', $item) }}" class="font-semibold text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="{{ route('admin.galleries.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this image?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-semibold text-rose-600 hover:text-rose-800">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $galleries->links() }}
        </div>
    @endif
</div>
@endsection
