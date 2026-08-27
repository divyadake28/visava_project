@extends('admin.layouts.app')

@section('breadcrumb', 'Enquiries / View')
@section('header', 'Customer Enquiry Details')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-lg font-bold text-slate-900">{{ $enquiry->name }}</h2>
            <p class="text-xs text-slate-500">Received on: {{ $enquiry->created_at->format('M d, Y \a\t H:i') }}</p>
        </div>
        <a href="{{ route('admin.enquiries.index') }}" class="px-3 py-1.5 border border-slate-300 text-slate-700 text-xs font-semibold rounded-lg hover:bg-slate-50">&larr; Back to Enquiries</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
            <span class="text-slate-400 font-bold uppercase block mb-1">Email Address</span>
            <a href="mailto:{{ $enquiry->email }}" class="text-blue-600 font-medium hover:underline">{{ $enquiry->email }}</a>
        </div>
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
            <span class="text-slate-400 font-bold uppercase block mb-1">Phone Number</span>
            <span class="text-slate-800 font-mono">{{ $enquiry->phone ?? 'Not provided' }}</span>
        </div>
    </div>

    <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 space-y-2">
        <span class="text-slate-400 text-xs font-bold uppercase block">Subject / Service Requested</span>
        <h4 class="text-sm font-bold text-slate-900">{{ $enquiry->subject ?? 'General Enquiry' }}</h4>
        <span class="text-slate-400 text-xs font-bold uppercase block pt-2">Full Message</span>
        <p class="text-sm text-slate-700 whitespace-pre-line leading-relaxed">{{ $enquiry->message }}</p>
    </div>

    <!-- Update Status Form -->
    <div class="p-4 border border-slate-200 rounded-xl flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-700 block">Current Status: <span class="badge {{ $enquiry->status === 'new' ? 'badge-new' : ($enquiry->status === 'contacted' ? 'badge-contacted' : 'badge-closed') }} ml-1">{{ ucfirst($enquiry->status) }}</span></span>
            <span class="text-[11px] text-slate-400">Change follow-up status</span>
        </div>
        <form action="{{ route('admin.enquiries.update', $enquiry) }}" method="POST" class="flex items-center gap-2 m-0">
            @csrf
            @method('PUT')
            <select name="status" class="px-3 py-1.5 text-xs rounded-lg border border-slate-300 bg-white">
                <option value="new" {{ $enquiry->status === 'new' ? 'selected' : '' }}>New</option>
                <option value="contacted" {{ $enquiry->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                <option value="closed" {{ $enquiry->status === 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
            <button type="submit" class="px-3 py-1.5 bg-slate-900 text-white text-xs font-bold rounded-lg hover:bg-slate-800">Update</button>
        </form>
    </div>
</div>
@endsection
