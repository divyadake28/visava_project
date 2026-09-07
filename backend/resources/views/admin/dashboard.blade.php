@extends('admin.layouts.app')

@section('breadcrumb', 'Overview')
@section('header', 'Welcome to Visava Resort Admin')

@section('content')
<div class="space-y-[14px]">

    <!-- 1. Premium Compact Hero Banner (160px desktop height, dark blue gradient) -->
    <div class="relative overflow-hidden rounded-[18px] hero-card-banner p-4 sm:p-5 lg:px-6 lg:py-3.5 text-white h-auto lg:h-[160px] flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <!-- Left Side Info -->
        <div class="relative z-10 flex flex-col justify-center max-w-2xl min-w-0">
            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 hero-badge-pill backdrop-blur-md rounded-full text-[12px] font-semibold w-fit">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Visava Resort & Tourism CMS Active</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-[34px] font-extrabold tracking-tight font-heading text-white leading-tight mt-1 truncate">
                Luxury Resort & CMS Overview
            </h2>
            <p class="text-xs sm:text-sm lg:text-[15px] text-slate-300 font-normal leading-snug mt-0.5 truncate">
                Curate bilingual Marathi & English content for tour packages, events, blogs, and guest enquiries in real-time.
            </p>
        </div>

        <!-- Right Side: Two Compact Action Buttons (Height 42px, Width 170px, Equal Spacing) -->
        <div class="relative z-10 flex flex-wrap sm:flex-nowrap items-center gap-3 shrink-0">
            <a href="{{ route('admin.packages.create') }}" 
               class="inline-flex items-center justify-center gap-2 w-full sm:w-[170px] h-[42px] hero-btn-primary text-white text-xs font-bold rounded-[14px] transition-all transform hover:scale-[1.02] shadow-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>New Package</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" 
               class="inline-flex items-center justify-center gap-2 w-full sm:w-[170px] h-[42px] hero-btn-secondary text-white text-xs font-bold rounded-[14px] transition-all transform hover:scale-[1.02] shadow-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>CMS Settings</span>
            </a>
        </div>

        <!-- Ambient Background Glow Circles -->
        <div class="absolute -right-16 -top-16 w-48 h-48 bg-blue-500/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute right-40 -bottom-20 w-48 h-48 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
    </div>

    <!-- 2. KPI Cards (Desktop: Stripe Style Grid) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7 gap-[14px]">
        
        <!-- 1. Blogs -->
        <div class="saas-card h-[130px] p-4 flex flex-col justify-between group">
            <div class="flex items-center justify-between">
                <span class="text-[12px] font-bold text-slate-400 uppercase tracking-wider">Blogs</span>
                <div class="w-[42px] h-[42px] rounded-[12px] icon-box-blue flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-colors duration-180 shadow-xs shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
            </div>
            <div>
                <div class="text-[28px] font-black text-slate-900 tracking-tight font-heading leading-none">{{ $stats['blogs_count'] }}</div>
                <p class="text-[11.5px] text-slate-500 font-medium mt-0.5 truncate">Articles</p>
            </div>
            <a href="{{ route('admin.blogs.index') }}" class="inline-flex items-center justify-between text-[11.5px] font-bold text-blue-600 group-hover:text-blue-700 pt-1.5 border-t border-slate-100/90 mt-auto">
                <span>Manage</span>
                <span class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
            </a>
        </div>

        <!-- 2. Events -->
        <div class="saas-card h-[130px] p-4 flex flex-col justify-between group">
            <div class="flex items-center justify-between">
                <span class="text-[12px] font-bold text-slate-400 uppercase tracking-wider">Events</span>
                <div class="w-[42px] h-[42px] rounded-[12px] icon-box-indigo flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-180 shadow-xs shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div>
                <div class="text-[28px] font-black text-slate-900 tracking-tight font-heading leading-none">{{ $stats['events_count'] }}</div>
                <p class="text-[11.5px] text-slate-500 font-medium mt-0.5 truncate">Carnivals</p>
            </div>
            <a href="{{ route('admin.events.index') }}" class="inline-flex items-center justify-between text-[11.5px] font-bold text-indigo-600 group-hover:text-indigo-700 pt-1.5 border-t border-slate-100/90 mt-auto">
                <span>Manage</span>
                <span class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
            </a>
        </div>

        <!-- 3. Packages -->
        <div class="saas-card h-[130px] p-4 flex flex-col justify-between group">
            <div class="flex items-center justify-between">
                <span class="text-[12px] font-bold text-slate-400 uppercase tracking-wider">Packages</span>
                <div class="w-[42px] h-[42px] rounded-[12px] icon-box-purple flex items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition-colors duration-180 shadow-xs shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
            </div>
            <div>
                <div class="text-[28px] font-black text-slate-900 tracking-tight font-heading leading-none">{{ $stats['packages_count'] }}</div>
                <p class="text-[11.5px] text-slate-500 font-medium mt-0.5 truncate">Stay & Tours</p>
            </div>
            <a href="{{ route('admin.packages.index') }}" class="inline-flex items-center justify-between text-[11.5px] font-bold text-purple-600 group-hover:text-purple-700 pt-1.5 border-t border-slate-100/90 mt-auto">
                <span>Manage</span>
                <span class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
            </a>
        </div>

        <!-- 4. Dining & Menus -->
        <div class="saas-card h-[130px] p-4 flex flex-col justify-between group">
            <div class="flex items-center justify-between">
                <span class="text-[12px] font-bold text-slate-400 uppercase tracking-wider">Dining</span>
                <div class="w-[42px] h-[42px] rounded-[12px] icon-box-amber flex items-center justify-center group-hover:bg-amber-600 group-hover:text-white transition-colors duration-180 shadow-xs shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
            </div>
            <div>
                <div class="text-[28px] font-black text-slate-900 tracking-tight font-heading leading-none">{{ $stats['dining_count'] ?? 0 }}</div>
                <p class="text-[11.5px] text-slate-500 font-medium mt-0.5 truncate">Menus & Dishes</p>
            </div>
            <a href="{{ route('admin.dining.index') }}" class="inline-flex items-center justify-between text-[11.5px] font-bold text-amber-600 group-hover:text-amber-700 pt-1.5 border-t border-slate-100/90 mt-auto">
                <span>Manage</span>
                <span class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
            </a>
        </div>

        <!-- 4. Galleries -->
        <div class="saas-card h-[130px] p-4 flex flex-col justify-between group">
            <div class="flex items-center justify-between">
                <span class="text-[12px] font-bold text-slate-400 uppercase tracking-wider">Galleries</span>
                <div class="w-[42px] h-[42px] rounded-[12px] icon-box-emerald flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-180 shadow-xs shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div>
                <div class="text-[28px] font-black text-slate-900 tracking-tight font-heading leading-none">{{ $stats['galleries_count'] }}</div>
                <p class="text-[11.5px] text-slate-500 font-medium mt-0.5 truncate">Photos</p>
            </div>
            <a href="{{ route('admin.galleries.index') }}" class="inline-flex items-center justify-between text-[11.5px] font-bold text-emerald-600 group-hover:text-emerald-700 pt-1.5 border-t border-slate-100/90 mt-auto">
                <span>Manage</span>
                <span class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
            </a>
        </div>

        <!-- 5. Reviews -->
        <div class="saas-card h-[130px] p-4 flex flex-col justify-between group">
            <div class="flex items-center justify-between">
                <span class="text-[12px] font-bold text-slate-400 uppercase tracking-wider">Reviews</span>
                <div class="w-[42px] h-[42px] rounded-[12px] icon-box-amber flex items-center justify-center group-hover:bg-amber-600 group-hover:text-white transition-colors duration-180 shadow-xs shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
            </div>
            <div>
                <div class="text-[28px] font-black text-slate-900 tracking-tight font-heading leading-none">{{ $stats['testimonials_count'] }}</div>
                <p class="text-[11.5px] text-slate-500 font-medium mt-0.5 truncate">Feedback</p>
            </div>
            <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center justify-between text-[11.5px] font-bold text-amber-600 group-hover:text-amber-700 pt-1.5 border-t border-slate-100/90 mt-auto">
                <span>Manage</span>
                <span class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
            </a>
        </div>

        <!-- 6. Leads -->
        <div class="saas-card h-[130px] p-4 flex flex-col justify-between group">
            <div class="flex items-center justify-between">
                <span class="text-[12px] font-bold text-slate-400 uppercase tracking-wider">Leads</span>
                <div class="w-[42px] h-[42px] rounded-[12px] icon-box-rose flex items-center justify-center group-hover:bg-rose-600 group-hover:text-white transition-colors duration-180 shadow-xs shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div>
                <div class="text-[28px] font-black text-slate-900 tracking-tight font-heading leading-none">{{ $stats['enquiries_count'] }}</div>
                <p class="text-[11.5px] text-rose-600 font-bold mt-0.5 truncate flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-ping"></span>
                    <span>{{ $stats['new_enquiries_count'] }} new unread</span>
                </p>
            </div>
            <a href="{{ route('admin.enquiries.index') }}" class="inline-flex items-center justify-between text-[11.5px] font-bold text-rose-600 group-hover:text-rose-700 pt-1.5 border-t border-slate-100/90 mt-auto">
                <span>Manage</span>
                <span class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
            </a>
        </div>

    </div>

    <!-- 3. Quick Actions Section (Desktop: 3 Columns, Height 115px, Top Margin 12px) -->
    <div class="mt-3 space-y-2.5">
        <div class="flex items-center justify-between">
            <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider flex items-center gap-1.5 font-heading">
                <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <span>Quick Actions</span>
            </h3>
            <span class="text-[11px] text-slate-400 font-medium">Frequently used shortcuts</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[14px]">
            <!-- Add Blog -->
            <a href="{{ route('admin.blogs.create') }}" class="saas-card h-[115px] p-4 flex items-center justify-between group hover:border-blue-500/80">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-[42px] h-[42px] rounded-[12px] bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-105 group-hover:bg-blue-600 group-hover:text-white transition-all duration-180 shadow-2xs shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-bold text-slate-900 block group-hover:text-blue-600 transition-colors truncate">Add Blog Article</span>
                        <span class="text-xs text-slate-400 block truncate">Post resort news & stories</span>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-300 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-180 shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>

            <!-- Add Event -->
            <a href="{{ route('admin.events.create') }}" class="saas-card h-[115px] p-4 flex items-center justify-between group hover:border-indigo-500/80">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-[42px] h-[42px] rounded-[12px] bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:scale-105 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-180 shadow-2xs shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-bold text-slate-900 block group-hover:text-indigo-600 transition-colors truncate">Publish Event</span>
                        <span class="text-xs text-slate-400 block truncate">Agro festivals & activities</span>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-300 group-hover:text-indigo-600 group-hover:translate-x-1 transition-all duration-180 shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>

            <!-- Add Package -->
            <a href="{{ route('admin.packages.create') }}" class="saas-card h-[115px] p-4 flex items-center justify-between group hover:border-purple-500/80">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-[42px] h-[42px] rounded-[12px] bg-purple-50 text-purple-600 flex items-center justify-center group-hover:scale-105 group-hover:bg-purple-600 group-hover:text-white transition-all duration-180 shadow-2xs shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-bold text-slate-900 block group-hover:text-purple-600 transition-colors truncate">Add Tour Package</span>
                        <span class="text-xs text-slate-400 block truncate">Day picnics & overnight stay</span>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-300 group-hover:text-purple-600 group-hover:translate-x-1 transition-all duration-180 shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>

            <!-- Upload Photos -->
            <a href="{{ route('admin.galleries.create') }}" class="saas-card h-[115px] p-4 flex items-center justify-between group hover:border-emerald-500/80">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-[42px] h-[42px] rounded-[12px] bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-105 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-180 shadow-2xs shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-bold text-slate-900 block group-hover:text-emerald-600 transition-colors truncate">Upload Photos</span>
                        <span class="text-xs text-slate-400 block truncate">Resort & cottages gallery</span>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-300 group-hover:text-emerald-600 group-hover:translate-x-1 transition-all duration-180 shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>

            <!-- View Leads -->
            <a href="{{ route('admin.enquiries.index') }}" class="saas-card h-[115px] p-4 flex items-center justify-between group hover:border-rose-500/80">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-[42px] h-[42px] rounded-[12px] bg-rose-50 text-rose-600 flex items-center justify-center group-hover:scale-105 group-hover:bg-rose-600 group-hover:text-white transition-all duration-180 shadow-2xs shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-bold text-slate-900 block group-hover:text-rose-600 transition-colors truncate">Manage Customer Leads</span>
                        <span class="text-xs text-slate-400 block truncate">Direct WhatsApp & enquiries</span>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-300 group-hover:text-rose-600 group-hover:translate-x-1 transition-all duration-180 shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>

            <!-- CMS Settings -->
            <a href="{{ route('admin.settings.index') }}" class="saas-card h-[115px] p-4 flex items-center justify-between group hover:border-amber-500/80">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-[42px] h-[42px] rounded-[12px] bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-105 group-hover:bg-amber-600 group-hover:text-white transition-all duration-180 shadow-2xs shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-bold text-slate-900 block group-hover:text-amber-600 transition-colors truncate">System & CMS Settings</span>
                        <span class="text-xs text-slate-400 block truncate">Contact numbers, SEO & branding</span>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-300 group-hover:text-amber-600 group-hover:translate-x-1 transition-all duration-180 shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    <!-- 4. Two-Column Layout: Recent Leads Table (Left 2 cols) & System Feed (Right 1 col) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-[14px] items-start">
        
        <!-- LEFT: Recent Enquiries Table (2 Cols on lg) -->
        <div class="lg:col-span-2 space-y-[14px]">
            <div class="saas-card overflow-hidden">
                <div class="px-5 py-3.5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-2 bg-slate-50/50">
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-sm font-bold text-slate-900 font-heading">Recent Customer Enquiries</h2>
                            <span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-[10.5px] font-bold rounded-full">{{ count($recentEnquiries) }} leads</span>
                        </div>
                        <p class="text-[11.5px] text-slate-500 mt-0.5">Real-time website inquiry submissions</p>
                    </div>
                    <a href="{{ route('admin.enquiries.index') }}" class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 hover:text-blue-700 hover:underline">
                        <span>View All Leads</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                @if ($recentEnquiries->isEmpty())
                    <div class="py-12 text-center text-slate-400">
                        <div class="w-12 h-12 mx-auto rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <p class="text-xs font-bold text-slate-700">No enquiries received yet</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">New visitor enquiries will appear here automatically.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-100 text-sm text-left">
                            <thead class="bg-slate-50/80 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                <tr>
                                    <th class="px-4 py-2.5">Guest</th>
                                    <th class="px-4 py-2.5">Contact</th>
                                    <th class="px-4 py-2.5">Subject</th>
                                    <th class="px-4 py-2.5">Status</th>
                                    <th class="px-4 py-2.5 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($recentEnquiries as $enquiry)
                                    <tr class="hover:bg-slate-50/60 transition-colors h-[54px]">
                                        <td class="px-4 py-2 whitespace-nowrap">
                                            <div class="flex items-center gap-2.5">
                                                <div class="w-8 h-8 rounded-[10px] bg-gradient-to-tr from-blue-600 to-indigo-600 text-white flex items-center justify-center font-bold text-xs shadow-xs shrink-0">
                                                    {{ substr($enquiry->name, 0, 1) }}
                                                </div>
                                                <span class="font-bold text-slate-900 text-xs truncate max-w-[130px]">{{ $enquiry->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap">
                                            <div class="text-xs font-semibold text-slate-800">{{ $enquiry->email }}</div>
                                            @if($enquiry->phone)
                                                <div class="text-[11px] text-slate-500 font-mono">{{ $enquiry->phone }}</div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 max-w-[180px]">
                                            <div class="font-semibold text-slate-800 text-xs truncate">{{ $enquiry->subject ?? 'General Inquiry' }}</div>
                                            <div class="text-[11px] text-slate-500 truncate">{{ $enquiry->message }}</div>
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap">
                                            <span class="badge {{ $enquiry->status === 'new' ? 'badge-new' : ($enquiry->status === 'contacted' ? 'badge-contacted' : 'badge-closed') }}">
                                                <span class="w-1.5 h-1.5 rounded-full {{ $enquiry->status === 'new' ? 'bg-amber-500' : ($enquiry->status === 'contacted' ? 'bg-blue-500' : 'bg-emerald-500') }}"></span>
                                                {{ ucfirst($enquiry->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2 text-right whitespace-nowrap">
                                            <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="inline-flex items-center gap-1 px-2.5 py-1 bg-slate-100 hover:bg-[#3B5BFE] hover:text-white text-slate-700 text-[11px] font-bold rounded-[10px] transition shadow-xs">
                                                <span>Review</span>
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- Resort Highlights Card -->
            <div class="saas-card p-4 space-y-3">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider font-heading">Visava Resort Attractions & Amenities</h3>
                    <span class="text-[11px] text-slate-400 font-medium">Daily Operations</span>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <div class="p-3 bg-blue-50/50 border border-blue-100/80 rounded-[14px] text-center">
                        <span class="text-xl block mb-0.5">🌊</span>
                        <span class="text-xs font-bold text-slate-800 block">Water Park</span>
                        <span class="text-[10px] text-emerald-600 font-bold">● Open Daily</span>
                    </div>
                    <div class="p-3 bg-indigo-50/50 border border-indigo-100/80 rounded-[14px] text-center">
                        <span class="text-xl block mb-0.5">🎢</span>
                        <span class="text-xs font-bold text-slate-800 block">Amusement Rides</span>
                        <span class="text-[10px] text-emerald-600 font-bold">● Operational</span>
                    </div>
                    <div class="p-3 bg-purple-50/50 border border-purple-100/80 rounded-[14px] text-center">
                        <span class="text-xl block mb-0.5">🏡</span>
                        <span class="text-xs font-bold text-slate-800 block">Deluxe Cottages</span>
                        <span class="text-[10px] text-blue-600 font-bold">● Booking Active</span>
                    </div>
                    <div class="p-3 bg-amber-50/50 border border-amber-100/80 rounded-[14px] text-center">
                        <span class="text-xl block mb-0.5">🍽️</span>
                        <span class="text-xs font-bold text-slate-800 block">Agro Dining</span>
                        <span class="text-[10px] text-emerald-600 font-bold">● Open Daily</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT: Operational Feed & API Health (1 Col on lg) -->
        <div class="space-y-[14px]">
            <!-- Recent Activity Timeline Feed -->
            <div class="saas-card p-4 space-y-3">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider flex items-center gap-1.5 font-heading">
                        <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Recent Activity</span>
                    </h3>
                    <span class="text-[10.5px] text-slate-400 font-medium">Real-time</span>
                </div>

                <div class="relative pl-5 space-y-3.5 before:absolute before:left-1.5 before:top-1.5 before:bottom-1.5 before:w-0.5 before:bg-slate-200">
                    <div class="relative">
                        <div class="absolute -left-5 top-1 w-2 h-2 rounded-full bg-blue-600 ring-2 ring-white"></div>
                        <p class="text-xs font-bold text-slate-900 leading-tight">Bilingual Tour Packages Synced</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Marathi & English content active</p>
                        <span class="text-[10px] text-slate-400 font-medium">Just now</span>
                    </div>

                    <div class="relative">
                        <div class="absolute -left-5 top-1 w-2 h-2 rounded-full bg-emerald-500 ring-2 ring-white"></div>
                        <p class="text-xs font-bold text-slate-900 leading-tight">Verified Guest Reviews Updated</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Ratings rendering with gold stars</p>
                        <span class="text-[10px] text-slate-400 font-medium">10 mins ago</span>
                    </div>

                    <div class="relative">
                        <div class="absolute -left-5 top-1 w-2 h-2 rounded-full bg-indigo-500 ring-2 ring-white"></div>
                        <p class="text-xs font-bold text-slate-900 leading-tight">Resort Events Scheduled</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Agro Festival details published</p>
                        <span class="text-[10px] text-slate-400 font-medium">1 hour ago</span>
                    </div>

                    <div class="relative">
                        <div class="absolute -left-5 top-1 w-2 h-2 rounded-full bg-amber-500 ring-2 ring-white"></div>
                        <p class="text-xs font-bold text-slate-900 leading-tight">Customer Leads Monitored</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">WhatsApp alerts online</p>
                        <span class="text-[10px] text-slate-400 font-medium">Today</span>
                    </div>
                </div>
            </div>

            <!-- System Status & REST API Live Health -->
            <div class="saas-card p-4 space-y-3">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider flex items-center gap-1.5 font-heading">
                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>System Health</span>
                    </h3>
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 animate-pulse"></span>
                        100% Online
                    </span>
                </div>

                <div class="space-y-2 text-xs">
                    <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                        <span class="text-slate-500 font-medium">Database (MySQL)</span>
                        <span class="inline-flex items-center gap-1 font-bold text-emerald-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Connected
                        </span>
                    </div>

                    <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                        <span class="text-slate-500 font-medium">REST API Suite</span>
                        <a href="{{ url('/api/v1/packages') }}" target="_blank" class="inline-flex items-center gap-1 font-bold text-blue-600 hover:underline">
                            <span>/api/v1/* Active</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>

                    <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                        <span class="text-slate-500 font-medium">Frontend Port</span>
                        <span class="inline-flex items-center gap-1 font-bold text-emerald-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Angular 4200
                        </span>
                    </div>

                    <div class="flex items-center justify-between py-1.5">
                        <span class="text-slate-500 font-medium">Configurations</span>
                        <a href="{{ route('admin.settings.index') }}" class="font-bold text-slate-900 hover:text-blue-600">
                            {{ $stats['settings_count'] }} keys &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection