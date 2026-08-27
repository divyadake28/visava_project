<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#F8FAFC]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Visava') }} - Luxury Resort & Tourism Admin Portal</title>

    <!-- Google Fonts: Poppins / Inter / Noto Sans Devanagari -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Noto+Sans+Devanagari:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --font-sans: 'Inter', 'Noto Sans Devanagari', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-heading: 'Poppins', 'Noto Sans Devanagari', sans-serif;
        }

        body {
            font-family: var(--font-sans);
            background-color: #F8FAFC;
            color: #0F172A;
            letter-spacing: -0.01em;
        }

        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: var(--font-heading);
            letter-spacing: -0.02em;
        }

        /* Custom Sleek Glass Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94A3B8;
        }

        /* Premium Deep Navy Sidebar */
        .admin-sidebar {
            width: 260px;
            background: linear-gradient(180deg, #06142A 0%, #0A1931 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.07);
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.12);
            border-radius: 9999px;
        }

        /* Navigation Links */
        .sidebar-link {
            position: relative;
            display: flex;
            align-items: center;
            padding: 10px 14px;
            border-radius: 14px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #94A3B8;
            transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-link:hover {
            color: #FFFFFF;
            background: rgba(255, 255, 255, 0.07);
            transform: translateX(4px);
        }
        .sidebar-link:hover svg {
            color: #38BDF8;
        }
        .sidebar-link.active {
            color: #FFFFFF;
            font-weight: 600;
            background: linear-gradient(135deg, #2563EB 0%, #4338CA 100%);
            box-shadow: 0 8px 20px -4px rgba(37, 99, 235, 0.45), inset 0 1px 1px rgba(255, 255, 255, 0.2);
        }
        .sidebar-link.active svg {
            color: #FFFFFF;
        }
        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 25%;
            height: 50%;
            width: 4px;
            border-radius: 4px;
            background: #38BDF8;
            box-shadow: 0 0 10px #38BDF8;
        }

        /* Premium Stat & Content Cards */
        .saas-card {
            background: #FFFFFF;
            border-radius: 22px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02), 0 1px 3px rgba(0, 0, 0, 0.02);
            transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .saas-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 32px -8px rgba(15, 23, 42, 0.08), 0 4px 12px rgba(15, 23, 42, 0.03);
            border-color: #CBD5E1;
        }

        /* Pill Status Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3.5px 12px;
            border-radius: 9999px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.02em;
        }
        .badge-new { background-color: #FEF3C7; color: #92400E; border: 1px solid #FDE68A; }
        .badge-active, .badge-published, .badge-approved { background-color: #ECFDF5; color: #065F46; border: 1px solid #A7F3D0; }
        .badge-inactive, .badge-draft { background-color: #F1F5F9; color: #475569; border: 1px solid #E2E8F0; }
        .badge-contacted { background-color: #EFF6FF; color: #1E40AF; border: 1px solid #BFDBFE; }
        .badge-closed { background-color: #FAF5FF; color: #6B21A8; border: 1px solid #E9D5FF; }
        .badge-pending { background-color: #FFF7ED; color: #9A3412; border: 1px solid #FFEDD5; }

        /* Dedicated Hero Banner Styles */
        .hero-card-banner {
            background: linear-gradient(135deg, #06142A 0%, #0F2347 50%, #1E1B4B 100%) !important;
            color: #FFFFFF !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            box-shadow: 0 20px 40px -15px rgba(6, 20, 42, 0.35) !important;
        }
        .hero-badge-pill {
            background: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.18) !important;
            color: #93C5FD !important;
        }
        .hero-btn-primary {
            background: #2563EB !important;
            color: #FFFFFF !important;
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.45) !important;
        }
        .hero-btn-primary:hover {
            background: #1D4ED8 !important;
        }
        .hero-btn-secondary {
            background: rgba(255, 255, 255, 0.12) !important;
            color: #FFFFFF !important;
            border: 1px solid rgba(255, 255, 255, 0.25) !important;
            backdrop-filter: blur(10px) !important;
        }
        .hero-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.22) !important;
        }

        /* Stat Card Accent Icon Boxes */
        .icon-box-blue { background-color: #EFF6FF !important; color: #2563EB !important; }
        .icon-box-indigo { background-color: #EEF2FF !important; color: #4F46E5 !important; }
        .icon-box-purple { background-color: #FAF5FF !important; color: #9333EA !important; }
        .icon-box-emerald { background-color: #ECFDF5 !important; color: #059669 !important; }
        .icon-box-amber { background-color: #FFFBEB !important; color: #D97706 !important; }
        .icon-box-rose { background-color: #FFF1F2 !important; color: #E11D48 !important; }
    </style>
</head>
<body class="h-full antialiased text-slate-800 selection:bg-blue-600 selection:text-white">
    <div class="min-h-screen flex bg-[#F8FAFC]">
        <!-- Mobile Sidebar Backdrop with Blur -->
        <div id="sidebarBackdrop" onclick="toggleSidebar()" class="fixed inset-0 z-40 bg-slate-950/70 backdrop-blur-md hidden md:hidden transition-opacity duration-300"></div>

        <!-- Fixed Left Sidebar (260px) -->
        <aside id="adminSidebar" class="admin-sidebar fixed inset-y-0 left-0 z-50 flex flex-col -translate-x-full md:translate-x-0 shadow-2xl md:shadow-none transition-transform duration-300">
            <!-- Branding Header -->
            <div class="h-20 px-6 flex items-center justify-between border-b border-white/[0.08] bg-black/20">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3.5 group">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-cyan-400 flex items-center justify-center text-white font-black shadow-lg shadow-blue-500/30 group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div>
                        <span class="text-base font-extrabold tracking-wide text-white block leading-tight font-heading">VISAVA ADMIN</span>
                        <span class="text-[11px] font-medium text-slate-400">Resort & Tourism Portal</span>
                    </div>
                </a>
                <button onclick="toggleSidebar()" class="md:hidden text-slate-400 hover:text-white p-1 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <div class="flex-1 overflow-y-auto px-4 py-5 space-y-1.5 sidebar-scroll">
                <div class="px-3 pb-2 text-[10px] font-bold uppercase tracking-wider text-slate-500">Core Modules</div>

                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.index') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    <span>Dashboard</span>
                </a>

                <!-- Blogs & News -->
                <a href="{{ route('admin.blogs.index') }}" class="sidebar-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <span>Blogs & News</span>
                </a>

                <!-- Resort Events -->
                <a href="{{ route('admin.events.index') }}" class="sidebar-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Resort Events</span>
                </a>

                <!-- Tour Packages -->
                <a href="{{ route('admin.packages.index') }}" class="sidebar-link {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <span>Tour Packages</span>
                </a>

                <!-- Experiences & Activities -->
                <a href="{{ route('admin.activities.index') }}" class="sidebar-link {{ request()->routeIs('admin.activities.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Experiences & Activities</span>
                </a>

                <!-- Photo Galleries -->
                <a href="{{ route('admin.galleries.index') }}" class="sidebar-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Photo Galleries</span>
                </a>

                <!-- Guest Reviews -->
                <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <span>Guest Reviews</span>
                </a>

                <!-- Enquiries & Leads -->
                <a href="{{ route('admin.enquiries.index') }}" class="sidebar-link {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Enquiries & Leads</span>
                </a>

                <div class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-wider text-slate-500">Website Management</div>

                <!-- CMS Settings -->
                <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>CMS & Settings</span>
                </a>
            </div>

            <!-- User Footer in Sidebar (Glass Card) -->
            <div class="p-4 border-t border-white/[0.08] bg-black/20">
                <div class="flex items-center gap-3 p-2.5 rounded-2xl bg-white/[0.04] border border-white/[0.08] backdrop-blur-md">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center text-xs font-black text-white uppercase shadow-md shadow-blue-900/30">
                        {{ substr(Auth::user()?->name ?? 'Admin', 0, 2) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold text-white truncate">{{ Auth::user()?->name ?? 'Admin User' }}</p>
                        <p class="text-[10px] text-slate-400 truncate">{{ Auth::user()?->email ?? 'admin@visawaresort.com' }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area (Offset by 260px on desktop) -->
        <div class="flex-1 flex flex-col md:pl-[260px] min-w-0">
            <!-- Sticky Glassmorphic Top Navbar -->
            <header class="sticky top-0 z-30 h-20 bg-white/80 backdrop-blur-xl border-b border-slate-200/80 flex items-center px-4 sm:px-6 lg:px-8 justify-between transition-shadow">
                <!-- Left: Mobile Menu & Page Breadcrumbs -->
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100 focus:outline-none transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <div>
                        <div class="flex items-center gap-2 text-xs text-slate-400 font-medium">
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition">Visava Admin</a>
                            <span>/</span>
                            <span class="text-slate-700 font-semibold">@yield('breadcrumb', 'Dashboard')</span>
                        </div>
                        <h1 class="text-xl font-black text-slate-900 tracking-tight leading-tight mt-0.5 font-heading">
                            @yield('header', 'Dashboard')
                        </h1>
                    </div>
                </div>

                <!-- Right Action Controls -->
                <div class="flex items-center gap-3">
                    <!-- Quick Search Bar -->
                    <div class="relative hidden md:block w-48 lg:w-64">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" placeholder="Search CMS content..." class="w-full pl-9 pr-3.5 py-1.5 bg-slate-100/80 hover:bg-slate-100 focus:bg-white border border-slate-200/90 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-xs rounded-full outline-none transition duration-150">
                    </div>

                    <!-- Multilingual Indicator Badge -->
                    <div class="hidden lg:flex items-center gap-2 px-3 py-1.5 bg-blue-50/80 border border-blue-100 rounded-full text-xs font-semibold text-blue-700">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        <span>मराठी + English CMS</span>
                    </div>

                    <!-- Notification Bell with Counter -->
                    <a href="{{ route('admin.enquiries.index') }}" class="relative p-2 rounded-full text-slate-500 hover:text-blue-600 hover:bg-slate-100 transition" title="New Inquiries">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-rose-500 ring-2 ring-white"></span>
                    </a>

                    <!-- Admin Profile Pill -->
                    <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-slate-100/90 rounded-full border border-slate-200/90 text-xs font-semibold text-slate-700">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>{{ Auth::user()?->name ?? 'Admin' }}</span>
                    </div>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white border border-rose-200 hover:border-rose-600 text-xs font-bold rounded-full transition duration-150 shadow-xs group">
                            <svg class="w-3.5 h-3.5 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Main Page Content Container -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <div class="max-w-7xl mx-auto space-y-6">
                    @if (session('success'))
                        <div class="flex items-center gap-3 p-4 bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs font-semibold rounded-2xl shadow-sm">
                            <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="flex-1">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="flex items-center gap-3 p-4 bg-rose-50 border border-rose-200 text-rose-900 text-xs font-semibold rounded-2xl shadow-sm">
                            <div class="w-6 h-6 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </div>
                            <span class="flex-1">{{ session('error') }}</span>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar JavaScript Toggle -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }
        }
    </script>
</body>
</html>