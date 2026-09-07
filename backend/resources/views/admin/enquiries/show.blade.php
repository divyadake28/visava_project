@extends('admin.layouts.app')

@section('breadcrumb', 'Enquiries / View')
@section('header', 'Customer Enquiry Details')

@section('content')
@php
    $cleanPhone = preg_replace('/[^0-9]/', '', $enquiry->phone ?? '');
    if (strlen($cleanPhone) === 10) {
        $whatsappNumber = '91' . $cleanPhone;
    } else {
        $whatsappNumber = $cleanPhone;
    }
    $greeting = rawurlencode("Hello " . $enquiry->name . ", thank you for reaching out to Visava Agro Tourism & Resort regarding your enquiry: '" . ($enquiry->subject ?? 'General Enquiry') . "'. How can we assist you today?");
    $waLink = $whatsappNumber ? "https://wa.me/{$whatsappNumber}?text={$greeting}" : null;
    
    $parts = explode(' ', trim($enquiry->name));
    $initials = strtoupper(substr($parts[0] ?? 'G', 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''));
@endphp

<div class="max-w-4xl mx-auto space-y-4">

    <!-- Back Button Header -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.enquiries.index') }}" 
           class="inline-flex items-center gap-2 h-[38px] px-3.5 rounded-[14px] bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-xs font-bold shadow-xs transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Back to Leads</span>
        </a>

        <div class="flex items-center gap-2">
            @if ($waLink)
                <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 h-[38px] px-4 bg-[#10B981] hover:bg-[#059669] text-white text-xs font-bold rounded-[14px] shadow-sm shadow-emerald-500/20 hover:scale-105 transition-all duration-200">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.531 1.83.813 2.796.814 3.183 0 5.769-2.588 5.77-5.768 0-3.18-2.587-5.768-5.77-5.768zm3.385 8.163c-.144.405-.837.774-1.17.823-.312.045-.694.075-2.226-.554-1.815-.747-3.003-2.593-3.093-2.714-.089-.122-.74-1.002-.74-1.921 0-.92.474-1.373.644-1.562.17-.189.37-.236.494-.236.124 0 .248.002.356.007.114.006.266-.044.417.319.155.371.533 1.3.579 1.396.046.095.077.207.014.332-.062.126-.094.205-.186.314-.093.108-.196.242-.28.325-.094.093-.193.195-.083.383.11.189.49 1.81 1.047 2.307.72.64 1.328.841 1.517.935.189.094.298.079.407-.047.11-.125.467-.544.593-.732.125-.188.25-.157.42-.094.17.063 1.082.511 1.268.604.186.094.31.141.356.22.046.079.046.455-.098.86z"/>
                        <path d="M12 2C6.477 2 2 6.477 2 12c0 1.891.524 3.66 1.438 5.176L2 22l4.981-1.396C8.423 21.492 10.155 22 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18.25c-1.637 0-3.15-.494-4.416-1.341l-.317-.212-3.109.871.884-3.031-.233-.338C3.896 14.869 3.4 13.486 3.4 12c0-4.742 3.858-8.6 8.6-8.6 4.742 0 8.6 3.858 8.6 8.6 0 4.742-3.858 8.6-8.6 8.6z"/>
                    </svg>
                    <span>Chat on WhatsApp</span>
                </a>
            @endif

            <form action="{{ route('admin.enquiries.destroy', $enquiry) }}" method="POST" class="m-0" onsubmit="return confirm('Delete this enquiry record?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-1.5 h-[38px] px-3.5 bg-white hover:bg-rose-50 text-rose-600 border border-rose-300 hover:border-rose-400 text-xs font-bold rounded-[14px] transition duration-150 shadow-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    <span>Delete</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Details Card: 18px radius, compact padding -->
    <div class="saas-card p-[18px] sm:p-6 space-y-4 bg-white">
        
        <!-- Header with Avatar and Basic Info -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-slate-100 gap-4">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center font-black text-lg shadow-md shadow-blue-500/20">
                    {{ $initials ?: 'G' }}
                </div>
                <div>
                    <div class="flex items-center gap-2.5">
                        <h2 class="text-xl font-black text-slate-900 font-heading">{{ $enquiry->name }}</h2>
                        <span class="badge {{ $enquiry->status === 'new' ? 'badge-new' : ($enquiry->status === 'contacted' ? 'badge-contacted' : 'badge-closed') }}">
                            {{ ucfirst($enquiry->status) }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mt-1">
                        Received on: <span class="font-semibold text-slate-700">{{ $enquiry->created_at->format('M d, Y \a\t h:i A') }}</span> ({{ $enquiry->created_at->diffForHumans() }})
                    </p>
                </div>
            </div>

            <!-- Quick Status Update Dropdown Form -->
            <form action="{{ route('admin.enquiries.update', $enquiry) }}" method="POST" class="m-0 flex items-center gap-2 self-start sm:self-auto bg-slate-50 p-1.5 rounded-2xl border border-slate-200">
                @csrf
                @method('PUT')
                <span class="text-[11px] font-bold text-slate-500 pl-2">Status:</span>
                <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-xl px-3 py-1.5 border border-slate-200 bg-white cursor-pointer outline-none focus:ring-2 focus:ring-blue-500/20">
                    <option value="new" {{ $enquiry->status === 'new' ? 'selected' : '' }}>🟡 New Lead</option>
                    <option value="contacted" {{ $enquiry->status === 'contacted' ? 'selected' : '' }}>🔵 Contacted</option>
                    <option value="closed" {{ $enquiry->status === 'closed' ? 'selected' : '' }}>🟣 Closed</option>
                </select>
            </form>
        </div>

        <!-- Contact Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Email -->
            <div class="p-5 bg-slate-50/70 rounded-2xl border border-slate-100 flex items-start gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-blue-100/80 text-blue-700 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Customer Email</span>
                    <a href="mailto:{{ $enquiry->email }}" class="text-sm font-bold text-blue-600 hover:underline block mt-0.5">
                        {{ $enquiry->email }}
                    </a>
                </div>
            </div>

            <!-- Phone -->
            <div class="p-5 bg-slate-50/70 rounded-2xl border border-slate-100 flex items-start gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-emerald-100/80 text-emerald-700 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Mobile Number</span>
                    @if ($enquiry->phone)
                        <a href="tel:{{ $enquiry->phone }}" class="text-sm font-bold font-mono text-slate-800 hover:text-emerald-600 block mt-0.5">
                            {{ $enquiry->phone }}
                        </a>
                    @else
                        <span class="text-sm text-slate-400 italic">Not provided</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Subject & Full Message -->
        <div class="p-6 bg-slate-50/80 rounded-2xl border border-slate-200/70 space-y-3">
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-1">Subject / Purpose of Visit</span>
                <h4 class="text-base font-extrabold text-slate-900 font-heading">
                    {{ $enquiry->subject ?: 'General Enquiry' }}
                </h4>
            </div>

            <div class="pt-3 border-t border-slate-200/60">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-2">Customer Message</span>
                <p class="text-sm text-slate-700 leading-relaxed whitespace-pre-line font-medium bg-white p-4 rounded-xl border border-slate-200/80 shadow-2xs">
                    {{ $enquiry->message }}
                </p>
            </div>
        </div>

    </div>

</div>
@endsection
