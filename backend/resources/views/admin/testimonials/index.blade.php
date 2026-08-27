@extends('admin.layouts.app')

@section('breadcrumb', 'Testimonials')
@section('header', 'Manage Testimonials')

@section('content')
<div class="saas-card overflow-hidden space-y-0">
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
        <div>
            <h2 class="text-base font-bold text-slate-900 font-heading">Customer Testimonials & Reviews</h2>
            <p class="text-xs text-slate-500">Curate verified guest experiences and ratings</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>New Testimonial</span>
        </a>
    </div>

    @if ($testimonials->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            <p class="text-sm font-semibold text-slate-700">No guest reviews recorded</p>
            <p class="text-xs text-slate-400 mt-1">Add guest testimonials and star ratings.</p>
            <a href="{{ route('admin.testimonials.create') }}" class="mt-4 inline-flex items-center gap-1.5 px-4 py-2 bg-slate-900 text-white text-xs font-semibold rounded-lg hover:bg-slate-800 transition">
                + Add First Review
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-left">
                <thead class="bg-slate-50 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3.5">Guest Name</th>
                        <th class="px-6 py-3.5">Designation / City</th>
                        <th class="px-6 py-3.5">Star Rating</th>
                        <th class="px-6 py-3.5">Review Snippet</th>
                        <th class="px-6 py-3.5">Approval</th>
                        <th class="px-6 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($testimonials as $item)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $item->designation ?? 'Guest' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-amber-500 fill-current shrink-0" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="font-bold text-slate-900">{{ number_format($item->rating, 1) }}</span>
                                    <span class="text-xs text-slate-400 font-medium">/ 5</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-600 max-w-xs truncate">{{ $item->comment }}</td>
                            <td class="px-6 py-4">
                                <span class="badge {{ $item->is_approved ? 'badge-published' : 'badge-pending' }}">
                                    {{ $item->is_approved ? 'Approved' : 'Pending' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.testimonials.edit', $item) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="{{ route('admin.testimonials.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection
