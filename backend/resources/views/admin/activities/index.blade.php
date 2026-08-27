@extends('admin.layouts.app')

@section('breadcrumb', 'Experiences & Activities')
@section('header', 'Experiences & Activities (अनुभव व उपक्रम)')

@section('content')
<div class="saas-card overflow-hidden space-y-0">
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
        <div>
            <h2 class="text-base font-bold text-slate-900 font-heading">Experiences & Resort Activities</h2>
            <p class="text-xs text-slate-500">Manage water park attractions, adventure rides, dining and luxury stays</p>
        </div>
        <a href="{{ route('admin.activities.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>नवीन उपक्रम जोडा (New Activity)</span>
        </a>
    </div>

    <!-- Filter Bar -->
    <div class="p-4 bg-slate-50/70 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
        <form method="GET" action="{{ route('admin.activities.index') }}" class="flex flex-wrap items-center gap-2.5 w-full sm:w-auto">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title or description..." class="px-3.5 py-1.5 text-xs rounded-xl border border-slate-300 focus:border-blue-500 outline-none w-64 bg-white">
            <select name="status" class="px-3 py-1.5 text-xs rounded-xl border border-slate-300 focus:border-blue-500 outline-none bg-white">
                <option value="">All Status (सर्व)</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active Only</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive Only</option>
            </select>
            <button type="submit" class="px-3 py-1.5 bg-slate-800 text-white text-xs font-semibold rounded-xl hover:bg-slate-700 transition">Filter</button>
            @if(request()->hasAny(['search', 'status']))
                <a href="{{ route('admin.activities.index') }}" class="text-xs text-slate-500 hover:text-slate-800 underline">Clear</a>
            @endif
        </form>
    </div>

    @if ($activities->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <p class="text-sm font-semibold text-slate-700">No activities or experiences found</p>
            <p class="text-xs text-slate-400 mt-1">Add water rides, cottage stays, dining packages, or adventure activities.</p>
            <a href="{{ route('admin.activities.create') }}" class="mt-4 inline-flex items-center gap-1.5 px-4 py-2 bg-slate-900 text-white text-xs font-semibold rounded-lg hover:bg-slate-800 transition">
                + Create First Activity
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-left">
                <thead class="bg-slate-50 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3.5">Image</th>
                        <th class="px-6 py-3.5">Title (Marathi & English)</th>
                        <th class="px-6 py-3.5">Icon</th>
                        <th class="px-6 py-3.5">Order</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($activities as $act)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-6 py-4">
                                @if ($act->image)
                                    <img src="{{ app(\App\Services\FileUploadService::class)->url($act->image) }}" alt="Thumbnail" class="w-14 h-10 object-cover rounded-lg border border-slate-200">
                                @else
                                    <div class="w-14 h-10 bg-slate-100 rounded-lg flex items-center justify-center text-slate-400 text-xs border border-slate-200">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-900">{{ $act->title_en ?: $act->title_mr }}</div>
                                @if($act->title_mr && $act->title_en)
                                    <div class="text-xs text-slate-500 font-medium mt-0.5">{{ $act->title_mr }}</div>
                                @endif
                                @if($act->short_description_en || $act->short_description_mr)
                                    <div class="text-[11px] text-slate-400 line-clamp-1 mt-1">{{ $act->short_description_en ?: $act->short_description_mr }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-base">
                                {{ $act->icon ?: '—' }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-600">
                                {{ $act->sort_order }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="badge {{ $act->is_active ? 'badge-active' : 'badge-inactive' }}">
                                    {{ $act->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.activities.show', $act) }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">View</a>
                                <a href="{{ route('admin.activities.edit', $act) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="{{ route('admin.activities.destroy', $act) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this activity?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-800 cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $activities->links() }}
        </div>
    @endif
</div>
@endsection