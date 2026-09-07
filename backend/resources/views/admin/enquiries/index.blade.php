@extends('admin.layouts.app')

@section('breadcrumb', 'Enquiries')
@section('header', 'Manage Customer Enquiries')

@section('content')
<div class="space-y-4">

    <!-- KPI Cards: 4 equal columns on desktop, 118px height, 18px padding, 18px radius -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5">
        <!-- 1. Total Leads -->
        <div class="saas-card h-[118px] p-[18px] flex items-center justify-between">
            <div class="flex flex-col justify-between h-full">
                <span class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Total Leads</span>
                <span class="text-3xl font-black text-slate-900 font-heading leading-none">{{ $counts['all'] ?? 0 }}</span>
                <span class="text-[11px] text-slate-400">All submissions</span>
            </div>
            <div class="w-10 h-10 rounded-[14px] bg-blue-50 text-[#3B5BFE] flex items-center justify-center shrink-0 border border-blue-100 shadow-xs">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
            </div>
        </div>

        <!-- 2. New Leads -->
        <div class="saas-card h-[118px] p-[18px] flex items-center justify-between border-amber-200/80 bg-gradient-to-br from-white to-amber-50/20">
            <div class="flex flex-col justify-between h-full">
                <div class="flex items-center gap-1.5">
                    <span class="text-[11px] font-semibold text-amber-700 uppercase tracking-wider">New Leads</span>
                    @if (($counts['new'] ?? 0) > 0)
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span>
                    @endif
                </div>
                <span class="text-3xl font-black text-amber-900 font-heading leading-none">{{ $counts['new'] ?? 0 }}</span>
                <span class="text-[11px] text-amber-600/90 font-medium">Pending action</span>
            </div>
            <div class="w-10 h-10 rounded-[14px] bg-amber-100/80 text-amber-700 flex items-center justify-center shrink-0 border border-amber-200 shadow-xs">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- 3. Contacted -->
        <div class="saas-card h-[118px] p-[18px] flex items-center justify-between">
            <div class="flex flex-col justify-between h-full">
                <span class="text-[11px] font-semibold text-[#3B5BFE] uppercase tracking-wider">Contacted</span>
                <span class="text-3xl font-black text-blue-900 font-heading leading-none">{{ $counts['contacted'] ?? 0 }}</span>
                <span class="text-[11px] text-slate-400">In follow-up</span>
            </div>
            <div class="w-10 h-10 rounded-[14px] bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0 border border-indigo-100 shadow-xs">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </div>
        </div>

        <!-- 4. Closed -->
        <div class="saas-card h-[118px] p-[18px] flex items-center justify-between">
            <div class="flex flex-col justify-between h-full">
                <span class="text-[11px] font-semibold text-emerald-700 uppercase tracking-wider">Closed</span>
                <span class="text-3xl font-black text-emerald-900 font-heading leading-none">{{ $counts['closed'] ?? 0 }}</span>
                <span class="text-[11px] text-slate-400">Booked / resolved</span>
            </div>
            <div class="w-10 h-10 rounded-[14px] bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-100 shadow-xs">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
    </div>

    <!-- Main CRM Table Card: 18px Radius, Compact 18px Padding, Shadow -->
    <div class="saas-card overflow-hidden bg-white">

        <!-- Card Header: Title, Count Badge, and Filter Pills (Height 36px) -->
        <div class="px-5 py-4 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-3 bg-white">
            <div class="flex items-center gap-2.5">
                <h2 class="text-lg font-bold text-slate-900 font-heading">Guest Enquiries & Leads</h2>
                <span class="px-2 py-0.5 text-[11px] font-bold rounded-full bg-slate-100 text-slate-700 border border-slate-200/80">
                    {{ $enquiries->total() }} Records
                </span>
            </div>

            <!-- Compact Filter Pills (Height 36px) -->
            <div class="flex items-center gap-1.5 bg-slate-100/90 p-1 rounded-[14px] border border-slate-200/70 h-[36px]">
                <a href="{{ route('admin.enquiries.index', array_merge(request()->except('status', 'page'))) }}" 
                   class="inline-flex items-center gap-1.5 px-3 h-full text-xs rounded-[10px] font-bold transition duration-150 {{ !request('status') ? 'bg-[#3B5BFE] text-white shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/60' }}">
                    <span>All</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-full {{ !request('status') ? 'bg-white/20 text-white' : 'bg-slate-200 text-slate-600' }}">{{ $counts['all'] ?? 0 }}</span>
                </a>

                <a href="{{ route('admin.enquiries.index', array_merge(request()->except('status', 'page'), ['status' => 'new'])) }}" 
                   class="inline-flex items-center gap-1.5 px-3 h-full text-xs rounded-[10px] font-bold transition duration-150 {{ request('status') === 'new' ? 'bg-[#F59E0B] text-white shadow-xs' : 'text-slate-600 hover:text-amber-700 hover:bg-amber-50' }}">
                    <span>New</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-full {{ request('status') === 'new' ? 'bg-white/20 text-white' : 'bg-amber-100 text-amber-800' }}">{{ $counts['new'] ?? 0 }}</span>
                </a>

                <a href="{{ route('admin.enquiries.index', array_merge(request()->except('status', 'page'), ['status' => 'contacted'])) }}" 
                   class="inline-flex items-center gap-1.5 px-3 h-full text-xs rounded-[10px] font-bold transition duration-150 {{ request('status') === 'contacted' ? 'bg-[#3B5BFE] text-white shadow-xs' : 'text-slate-600 hover:text-blue-700 hover:bg-blue-50' }}">
                    <span>Contacted</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-full {{ request('status') === 'contacted' ? 'bg-white/20 text-white' : 'bg-blue-100 text-blue-800' }}">{{ $counts['contacted'] ?? 0 }}</span>
                </a>

                <a href="{{ route('admin.enquiries.index', array_merge(request()->except('status', 'page'), ['status' => 'closed'])) }}" 
                   class="inline-flex items-center gap-1.5 px-3 h-full text-xs rounded-[10px] font-bold transition duration-150 {{ request('status') === 'closed' ? 'bg-[#10B981] text-white shadow-xs' : 'text-slate-600 hover:text-emerald-700 hover:bg-emerald-50' }}">
                    <span>Closed</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-full {{ request('status') === 'closed' ? 'bg-white/20 text-white' : 'bg-emerald-100 text-emerald-800' }}">{{ $counts['closed'] ?? 0 }}</span>
                </a>
            </div>
        </div>

        <!-- Compact Search Area (Height 42px, Rounded 14px, Icon inside, Full width or inline) -->
        <div class="px-5 py-3 border-b border-slate-100 bg-slate-50/40 flex flex-col sm:flex-row items-center justify-between gap-3">
            <form method="GET" action="{{ route('admin.enquiries.index') }}" class="w-full sm:w-80 relative m-0 flex items-center">
                @if (request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search guest, phone, email..." 
                       class="w-full h-[42px] pl-9 pr-10 bg-white hover:bg-slate-50 focus:bg-white border border-slate-200/90 focus:border-[#3B5BFE] focus:ring-2 focus:ring-[#3B5BFE]/15 text-xs rounded-[14px] outline-none transition duration-150">
                
                @if (request('search'))
                    <a href="{{ route('admin.enquiries.index', request()->except('search')) }}" 
                       class="absolute right-3 text-slate-400 hover:text-slate-600 text-xs" title="Clear Search">
                        ✕
                    </a>
                @endif
            </form>

            <div class="text-xs text-slate-500">
                Showing <span class="font-bold text-slate-800">{{ $enquiries->firstItem() ?? 0 }}</span>–<span class="font-bold text-slate-800">{{ $enquiries->lastItem() ?? 0 }}</span> of <span class="font-bold text-slate-800">{{ $enquiries->total() }}</span> enquiries
            </div>
        </div>

        <!-- Table: Compact Row Height 58–60px, No Horizontal Overflow -->
        @if ($enquiries->isEmpty())
            <div class="py-16 text-center text-slate-400">
                <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-sm font-bold text-slate-800 font-heading">No enquiries found</h3>
                <p class="text-xs text-slate-500 max-w-sm mx-auto mt-1">
                    @if (request('search') || request('status'))
                        No records match the selected filter. Try resetting.
                    @else
                        Direct customer inquiries will appear here.
                    @endif
                </p>
                @if (request('search') || request('status'))
                    <a href="{{ route('admin.enquiries.index') }}" class="mt-3 inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-900 text-white text-xs font-bold rounded-xl transition">
                        Reset Filters
                    </a>
                @endif
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse" style="min-width: 980px;">
                    <thead class="bg-slate-50/80 text-[11px] font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200/80">
                        <tr>
                            <th class="px-5 py-3 w-[22%]">Guest</th>
                            <th class="px-5 py-3 w-[20%]">Contact</th>
                            <th class="px-5 py-3 w-[28%]">Subject</th>
                            <th class="px-5 py-3 w-[12%] text-center">Status</th>
                            <th class="px-5 py-3 w-[10%]">Date</th>
                            <th class="px-5 py-3 w-[8%] text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @foreach ($enquiries as $item)
                            @php
                                $cleanPhone = preg_replace('/[^0-9]/', '', $item->phone ?? '');
                                if (strlen($cleanPhone) === 10) {
                                    $whatsappNumber = '91' . $cleanPhone;
                                } else {
                                    $whatsappNumber = $cleanPhone;
                                }
                                $greeting = rawurlencode("Hello " . $item->name . ", thank you for contacting Visava Agro Tourism & Resort regarding your enquiry: '" . ($item->subject ?? 'General Enquiry') . "'. How can we assist you today?");
                                $waLink = $whatsappNumber ? "https://wa.me/{$whatsappNumber}?text={$greeting}" : null;
                                
                                $parts = explode(' ', trim($item->name));
                                $initials = strtoupper(substr($parts[0] ?? 'G', 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''));
                            @endphp

                            <!-- Row Height 58–60px -->
                            <tr class="h-[58px] hover:bg-slate-50/75 transition duration-150">
                                
                                <!-- Guest Cell (42x42 avatar, bold name, small guest ID) -->
                                <td class="px-5 py-2">
                                    <div class="flex items-center gap-3">
                                        <div class="w-[42px] h-[42px] rounded-[12px] bg-gradient-to-tr from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center font-bold text-xs shadow-xs shrink-0">
                                            {{ $initials ?: 'G' }}
                                        </div>
                                        <div class="min-w-0">
                                            <a href="{{ route('admin.enquiries.show', $item) }}" class="text-sm font-semibold text-slate-900 hover:text-[#3B5BFE] transition block truncate leading-tight">
                                                {{ $item->name }}
                                            </a>
                                            <span class="text-[11px] text-slate-400 font-mono block mt-0.5">
                                                Lead #{{ $item->id }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Contact Cell (Email, Phone, smaller icons) -->
                                <td class="px-5 py-2">
                                    <div class="space-y-0.5">
                                        <div class="flex items-center gap-1.5 text-xs text-slate-700">
                                            <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                            <a href="mailto:{{ $item->email }}" class="hover:text-[#3B5BFE] transition truncate max-w-[170px]" title="{{ $item->email }}">
                                                {{ $item->email }}
                                            </a>
                                        </div>
                                        <div class="flex items-center gap-1.5 text-xs font-mono text-slate-600">
                                            <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                            @if ($item->phone)
                                                <a href="tel:{{ $item->phone }}" class="hover:text-emerald-600 font-semibold transition">
                                                    {{ $item->phone }}
                                                </a>
                                            @else
                                                <span class="text-slate-400 text-[10px] italic">Not provided</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- Subject & Message (Limit to two lines, ellipsis) -->
                                <td class="px-5 py-2">
                                    <div class="space-y-0.5 max-w-xs">
                                        <span class="text-xs font-bold text-slate-900 block truncate">
                                            {{ $item->subject ?: 'General Enquiry' }}
                                        </span>
                                        <p class="text-[12px] text-slate-500 line-clamp-2 leading-relaxed" title="{{ $item->message }}">
                                            {{ $item->message }}
                                        </p>
                                    </div>
                                </td>

                                <!-- Status (Rounded Pills: Orange for New, Blue for Contacted, Green for Closed) -->
                                <td class="px-5 py-2 text-center">
                                    <form action="{{ route('admin.enquiries.update', $item) }}" method="POST" class="inline-block m-0">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" 
                                                onchange="this.form.submit()" 
                                                class="text-[11px] font-bold rounded-full px-3 py-1 border transition duration-150 cursor-pointer shadow-2xs outline-none
                                                {{ $item->status === 'new' ? 'bg-amber-50 text-amber-800 border-amber-300 hover:bg-amber-100' : '' }}
                                                {{ $item->status === 'contacted' ? 'bg-blue-50 text-blue-800 border-blue-300 hover:bg-blue-100' : '' }}
                                                {{ $item->status === 'closed' ? 'bg-emerald-50 text-emerald-800 border-emerald-300 hover:bg-emerald-100' : '' }}">
                                            <option value="new" {{ $item->status === 'new' ? 'selected' : '' }}>New</option>
                                            <option value="contacted" {{ $item->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="closed" {{ $item->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                        </select>
                                    </form>
                                </td>

                                <!-- Date (Date + Small time underneath) -->
                                <td class="px-5 py-2">
                                    <div class="text-xs font-medium text-slate-800 whitespace-nowrap">
                                        {{ $item->created_at->format('M d, Y') }}
                                    </div>
                                    <div class="text-[10px] text-slate-400 font-mono">
                                        {{ $item->created_at->format('h:i A') }}
                                    </div>
                                </td>

                                <!-- Action (40x40 Green WhatsApp Circle with Soft Shadow + Details + Delete) -->
                                <td class="px-5 py-2 text-right">
                                    <div class="flex items-center justify-end gap-1.5 whitespace-nowrap">
                                        
                                        <!-- WhatsApp 40x40 Circle (Green, White icon, Soft shadow, Hover scale 1.08) -->
                                        @if ($waLink)
                                            <a href="{{ $waLink }}" 
                                               target="_blank" 
                                               rel="noopener noreferrer"
                                               class="btn-whatsapp-crm" 
                                               title="Chat with {{ $item->name }} on WhatsApp">
                                                <svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.531 1.83.813 2.796.814 3.183 0 5.769-2.588 5.77-5.768 0-3.18-2.587-5.768-5.77-5.768zm3.385 8.163c-.144.405-.837.774-1.17.823-.312.045-.694.075-2.226-.554-1.815-.747-3.003-2.593-3.093-2.714-.089-.122-.74-1.002-.74-1.921 0-.92.474-1.373.644-1.562.17-.189.37-.236.494-.236.124 0 .248.002.356.007.114.006.266-.044.417.319.155.371.533 1.3.579 1.396.046.095.077.207.014.332-.062.126-.094.205-.186.314-.093.108-.196.242-.28.325-.094.093-.193.195-.083.383.11.189.49 1.81 1.047 2.307.72.64 1.328.841 1.517.935.189.094.298.079.407-.047.11-.125.467-.544.593-.732.125-.188.25-.157.42-.094.17.063 1.082.511 1.268.604.186.094.31.141.356.22.046.079.046.455-.098.86z"/>
                                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 1.891.524 3.66 1.438 5.176L2 22l4.981-1.396C8.423 21.492 10.155 22 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18.25c-1.637 0-3.15-.494-4.416-1.341l-.317-.212-3.109.871.884-3.031-.233-.338C3.896 14.869 3.4 13.486 3.4 12c0-4.742 3.858-8.6 8.6-8.6 4.742 0 8.6 3.858 8.6 8.6 0 4.742-3.858 8.6-8.6 8.6z"/>
                                                </svg>
                                            </a>
                                        @else
                                            <span class="w-[38px] h-[38px] rounded-full bg-slate-100 text-slate-300 flex items-center justify-center cursor-not-allowed border border-slate-200/60" title="No phone provided">
                                                <svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.531 1.83.813 2.796.814 3.183 0 5.769-2.588 5.77-5.768 0-3.18-2.587-5.768-5.77-5.768zm3.385 8.163c-.144.405-.837.774-1.17.823-.312.045-.694.075-2.226-.554-1.815-.747-3.003-2.593-3.093-2.714-.089-.122-.74-1.002-.74-1.921 0-.92.474-1.373.644-1.562.17-.189.37-.236.494-.236.124 0 .248.002.356.007.114.006.266-.044.417.319.155.371.533 1.3.579 1.396.046.095.077.207.014.332-.062.126-.094.205-.186.314-.093.108-.196.242-.28.325-.094.093-.193.195-.083.383.11.189.49 1.81 1.047 2.307.72.64 1.328.841 1.517.935.189.094.298.079.407-.047.11-.125.467-.544.593-.732.125-.188.25-.157.42-.094.17.063 1.082.511 1.268.604.186.094.31.141.356.22.046.079.046.455-.098.86z"/>
                                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 1.891.524 3.66 1.438 5.176L2 22l4.981-1.396C8.423 21.492 10.155 22 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18.25c-1.637 0-3.15-.494-4.416-1.341l-.317-.212-3.109.871.884-3.031-.233-.338C3.896 14.869 3.4 13.486 3.4 12c0-4.742 3.858-8.6 8.6-8.6 4.742 0 8.6 3.858 8.6 8.6 0 4.742-3.858 8.6-8.6 8.6z"/>
                                                </svg>
                                            </span>
                                        @endif

                                        <!-- View Details (40x40 circle) -->
                                        <a href="{{ route('admin.enquiries.show', $item) }}" 
                                           class="w-10 h-10 rounded-full bg-slate-100 hover:bg-[#3B5BFE] text-slate-600 hover:text-white flex items-center justify-center transition duration-150 shadow-2xs" 
                                           title="View Details">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </a>

                                        <!-- Delete (40x40 circle) -->
                                        <form action="{{ route('admin.enquiries.destroy', $item) }}" method="POST" class="inline m-0" onsubmit="return confirm('Delete this enquiry from {{ $item->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="w-10 h-10 rounded-full bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white flex items-center justify-center transition duration-150 shadow-2xs" 
                                                    title="Delete Enquiry">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Compact Pagination Footer -->
            <div class="px-5 py-3 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3 bg-white">
                <div class="text-xs text-slate-500">
                    Showing <span class="font-bold text-slate-800">{{ $enquiries->firstItem() ?? 0 }}</span>–<span class="font-bold text-slate-800">{{ $enquiries->lastItem() ?? 0 }}</span> of <span class="font-bold text-slate-800">{{ $enquiries->total() }}</span> records
                </div>
                <div>
                    {{ $enquiries->links() }}
                </div>
            </div>
        @endif

    </div>

</div>
@endsection
