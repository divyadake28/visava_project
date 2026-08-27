@extends('admin.layouts.app')

@section('breadcrumb', 'Enquiries')
@section('header', 'Manage Customer Enquiries')

@section('content')
<div class="saas-card overflow-hidden space-y-0">
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
        <div>
            <h2 class="text-base font-bold text-slate-900 font-heading">Guest Enquiries & Leads</h2>
            <p class="text-xs text-slate-500">Track, follow up, and update statuses of customer messages</p>
        </div>
        <!-- Status Filter -->
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.enquiries.index') }}" class="px-3 py-1.5 text-xs rounded-xl font-bold {{ !request('status') ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">All</a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'new']) }}" class="px-3 py-1.5 text-xs rounded-xl font-bold {{ request('status') === 'new' ? 'bg-amber-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">New</a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'contacted']) }}" class="px-3 py-1.5 text-xs rounded-xl font-bold {{ request('status') === 'contacted' ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">Contacted</a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'closed']) }}" class="px-3 py-1.5 text-xs rounded-xl font-bold {{ request('status') === 'closed' ? 'bg-purple-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">Closed</a>
        </div>
    </div>

    @if ($enquiries->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <p class="text-sm font-semibold text-slate-700">No customer enquiries found</p>
            <p class="text-xs text-slate-400 mt-1">Direct inquiries submitted from website visitors will show up here.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-left">
                <thead class="bg-slate-50 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3.5">Guest</th>
                        <th class="px-6 py-3.5">Contact Details</th>
                        <th class="px-6 py-3.5">Subject & Message</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5">Date</th>
                        <th class="px-6 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($enquiries as $item)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-slate-600">
                                <div>{{ $item->email }}</div>
                                <div class="text-xs text-slate-400 font-mono">{{ $item->phone ?? 'No phone' }}</div>
                            </td>
                            <td class="px-6 py-4 text-slate-700 max-w-sm">
                                <div class="font-medium text-slate-900">{{ $item->subject ?? 'General Enquiry' }}</div>
                                <div class="text-xs text-slate-500 truncate">{{ $item->message }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="badge {{ $item->status === 'new' ? 'badge-new' : ($item->status === 'contacted' ? 'badge-contacted' : 'badge-closed') }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs text-slate-500">{{ $item->created_at->format('M d, Y H:i') }}</td>
                            <td class="px-6 py-4 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.enquiries.show', $item) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800">View Details</a>
                                <form action="{{ route('admin.enquiries.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this enquiry?');">
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
            {{ $enquiries->links() }}
        </div>
    @endif
</div>
@endsection
