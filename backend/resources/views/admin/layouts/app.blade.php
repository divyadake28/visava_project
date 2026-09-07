<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#F8FAFC]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Visava') }} - Luxury Resort & Tourism Admin Portal</title>
    <link rel="icon" type="image/png" href="/favicon.png">

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

        /* ---------------------------------------------------- */
        /* CRM Sidebar Layout System (Linear / HubSpot CRM)     */
        /* ---------------------------------------------------- */
        .sidebar,
        .admin-sidebar {
            width: 240px !important;
            height: 100vh !important;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            bottom: 0 !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            z-index: 50 !important;
            display: flex !important;
            flex-direction: column !important;
            background: linear-gradient(180deg, #06142A 0%, #071A3D 100%) !important;
            border-right: 1px solid rgba(255, 255, 255, 0.08) !important;
        }

        .sidebar *,
        .admin-sidebar * {
            max-width: 100% !important;
            box-sizing: border-box !important;
        }

        .sidebar svg,
        .sidebar img,
        .admin-sidebar svg,
        .admin-sidebar img {
            max-width: 48px !important;
            max-height: 48px !important;
            flex-shrink: 0 !important;
        }

        /* Background Illustration Layer (Safe & Subdued) */
        .sidebar-bg {
            position: absolute !important;
            inset: 0 !important;
            opacity: .05 !important;
            pointer-events: none !important;
            z-index: 0 !important;
            background-size: contain !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
        }

        /* Logo Branding: Top padding 20px, Icon 48x48 */
        .sidebar-logo-box {
            padding: 20px 16px 16px 16px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07) !important;
            background: rgba(0, 0, 0, 0.15) !important;
            flex-shrink: 0 !important;
            position: relative !important;
            z-index: 2 !important;
        }

        .sidebar-logo-icon {
            width: 48px !important;
            height: 48px !important;
            min-width: 48px !important;
            min-height: 48px !important;
            border-radius: 14px !important;
            background: linear-gradient(135deg, #3B5BFE 0%, #2563EB 100%) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            color: #FFFFFF !important;
            box-shadow: 0 4px 14px rgba(59, 91, 254, 0.35) !important;
            flex-shrink: 0 !important;
        }

        .sidebar-logo-icon svg {
            width: 24px !important;
            height: 24px !important;
            max-width: 24px !important;
            max-height: 24px !important;
        }

        /* Menu Container: position: relative, z-index: 1, gap: 8px */
        .sidebar-menu {
            position: relative !important;
            z-index: 1 !important;
            flex: 1 1 auto !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            padding: 16px 12px !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 8px !important;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 4px !important;
        }
        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.12) !important;
            border-radius: 9999px !important;
        }

        /* Menu Item: height 46px, icon 20px, text 15px, padding 12px 16px, radius 14px */
        .sidebar-link {
            position: relative !important;
            display: flex !important;
            align-items: center !important;
            height: 46px !important;
            min-height: 46px !important;
            padding: 12px 16px !important;
            border-radius: 14px !important;
            font-size: 15px !important;
            font-weight: 500 !important;
            color: #94A3B8 !important;
            text-decoration: none !important;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
            gap: 12px !important;
            white-space: nowrap !important;
            overflow: hidden !important;
        }

        .sidebar-link:hover {
            color: #FFFFFF !important;
            background: rgba(255, 255, 255, 0.08) !important;
            transform: translateX(2px) !important;
        }

        .sidebar-link svg {
            width: 20px !important;
            height: 20px !important;
            min-width: 20px !important;
            min-height: 20px !important;
            max-width: 20px !important;
            max-height: 20px !important;
            color: #94A3B8 !important;
            flex-shrink: 0 !important;
            transition: color 0.2s ease !important;
        }

        .sidebar-link:hover svg {
            color: #38BDF8 !important;
        }

        /* Active Item: Blue gradient, soft glow, no clipping */
        .sidebar-link.active {
            color: #FFFFFF !important;
            font-weight: 600 !important;
            background: linear-gradient(135deg, #3B5BFE 0%, #2563EB 100%) !important;
            box-shadow: 0 4px 16px rgba(59, 91, 254, 0.45) !important;
        }

        .sidebar-link.active svg {
            color: #FFFFFF !important;
        }

        /* Bottom Admin Profile Card: Fixed inside sidebar bottom, padding: 16px, avatar: 42px */
        .sidebar-footer-card {
            position: sticky !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            padding: 16px !important;
            background: rgba(6, 20, 42, 0.95) !important;
            backdrop-filter: blur(8px) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
            flex-shrink: 0 !important;
            z-index: 2 !important;
        }

        .sidebar-footer-inner {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            padding: 8px 12px !important;
            border-radius: 14px !important;
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
        }

        .sidebar-avatar {
            width: 42px !important;
            height: 42px !important;
            min-width: 42px !important;
            min-height: 42px !important;
            border-radius: 12px !important;
            background: linear-gradient(135deg, #3B5BFE 0%, #6366F1 100%) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            color: #FFFFFF !important;
            font-weight: 700 !important;
            font-size: 14px !important;
            box-shadow: 0 2px 8px rgba(59, 91, 254, 0.3) !important;
            flex-shrink: 0 !important;
        }

        /* Explicit desktop offset to guarantee main content is NEVER covered by sidebar */
        @media (min-width: 768px) {
            .admin-main-content {
                padding-left: 240px !important;
            }
        }
        @media (max-width: 767px) {
            .admin-main-content {
                padding-left: 0 !important;
            }
        }

        /* Dedicated WhatsApp CRM Button (Green Circle with white icon) */
        .btn-whatsapp-crm {
            width: 38px !important;
            height: 38px !important;
            border-radius: 9999px !important;
            background-color: #10B981 !important;
            color: #FFFFFF !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.28) !important;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }
        .btn-whatsapp-crm:hover {
            background-color: #059669 !important;
            transform: scale(1.08) !important;
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.45) !important;
        }

        /* Premium Stat & Content Cards (18px radius, compact padding, luxury soft shadow) */
        .saas-card {
            background: #FFFFFF;
            border-radius: 18px;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            transition: all 180ms cubic-bezier(0.4, 0, 0.2, 1);
        }
        .saas-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.12);
        }

        /* Pill Status Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 9999px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.01em;
        }
        .badge-new { background-color: #FEF3C7; color: #B45309; border: 1px solid #FDE68A; }
        .badge-active, .badge-published, .badge-approved { background-color: #ECFDF5; color: #065F46; border: 1px solid #A7F3D0; }
        .badge-inactive, .badge-draft { background-color: #F1F5F9; color: #475569; border: 1px solid #E2E8F0; }
        .badge-contacted { background-color: #EFF6FF; color: #1D4ED8; border: 1px solid #BFDBFE; }
        .badge-closed { background-color: #ECFDF5; color: #047857; border: 1px solid #A7F3D0; }
        .badge-pending { background-color: #FFF7ED; color: #C2410C; border: 1px solid #FFEDD5; }

        /* Dedicated Hero Banner Styles (Height: 160px desktop) */
        .hero-card-banner {
            background: linear-gradient(135deg, #06142A 0%, #0F2347 50%, #1E1B4B 100%) !important;
            color: #FFFFFF !important;
            border-radius: 18px !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            box-shadow: 0 16px 36px -10px rgba(6, 20, 42, 0.3) !important;
        }
        .hero-badge-pill {
            background: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.18) !important;
            color: #93C5FD !important;
        }
        .hero-btn-primary {
            background: #2563EB !important;
            color: #FFFFFF !important;
            height: 42px !important;
            border-radius: 14px !important;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35) !important;
            transition: all 180ms ease !important;
        }
        .hero-btn-primary:hover {
            background: #1D4ED8 !important;
            transform: scale(1.02) !important;
            box-shadow: 0 6px 18px rgba(37, 99, 235, 0.45) !important;
        }
        .hero-btn-secondary {
            background: rgba(255, 255, 255, 0.1) !important;
            color: #FFFFFF !important;
            height: 42px !important;
            border-radius: 14px !important;
            border: 1px solid rgba(255, 255, 255, 0.22) !important;
            backdrop-filter: blur(10px) !important;
            transition: all 180ms ease !important;
        }
        .hero-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.18) !important;
            transform: scale(1.02) !important;
        }

        /* Stat Card Accent Icon Boxes (42px) */
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

        <!-- Fixed Left Sidebar (240px) -->
        <aside id="adminSidebar" class="sidebar admin-sidebar -translate-x-full md:translate-x-0 transition-transform duration-200">
            <!-- Safe & Subdued Background Illustration (Behind everything) -->
            <div class="sidebar-bg"></div>

            <!-- Logo Branding: Top padding 20px, Icon size 48x48, Text beside logo -->
            <div class="sidebar-logo-box">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 min-w-0 flex-1 group">
                    <div class="sidebar-logo-icon group-hover:scale-105 transition-transform flex items-center justify-center">
                        <img src="/images/visava_logo.png" alt="विसावा ॲग्रो टुरिझम" class="w-full h-full object-contain">
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-sm font-black tracking-wide text-white block leading-tight truncate font-heading">VISAVA ADMIN</span>
                        <span class="text-[10.5px] font-medium text-slate-400 block truncate">Resort & Tourism CRM</span>
                    </div>
                </a>
                <button onclick="toggleSidebar()" class="md:hidden text-slate-400 hover:text-white p-1 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Menu Container: position: relative, z-index: 1, gap: 8px -->
            <div class="sidebar-menu">
                <div class="px-3 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-400">Core Modules</div>

                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.index') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    <span>Dashboard</span>
                </a>

                <!-- Blogs & News -->
                <a href="{{ route('admin.blogs.index') }}" class="sidebar-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <span>Blogs & News</span>
                </a>

                <!-- Resort Events -->
                <a href="{{ route('admin.events.index') }}" class="sidebar-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Resort Events</span>
                </a>

                <!-- Tour Packages -->
                <a href="{{ route('admin.packages.index') }}" class="sidebar-link {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <span>Tour Packages</span>
                </a>

                <!-- Experiences & Activities -->
                <a href="{{ route('admin.activities.index') }}" class="sidebar-link {{ request()->routeIs('admin.activities.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Experiences</span>
                </a>

                <!-- Dining & Menus -->
                <a href="{{ route('admin.dining.index') }}" class="sidebar-link {{ request()->routeIs('admin.dining.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <span>Dining & Menus</span>
                </a>

                <!-- Photo Galleries -->
                <a href="{{ route('admin.galleries.index') }}" class="sidebar-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Photo Galleries</span>
                </a>

                <!-- Guest Reviews -->
                <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <span>Guest Reviews</span>
                </a>

                <!-- Enquiries & Leads -->
                <a href="{{ route('admin.enquiries.index') }}" class="sidebar-link {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Enquiries & Leads</span>
                </a>

                <div class="px-3 pt-3 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-400">Settings</div>

                <!-- CMS Settings -->
                <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>CMS Settings</span>
                </a>
            </div>

            <!-- Bottom Profile Card: Fixed inside sidebar bottom, padding: 16px, avatar: 42px -->
            <div class="sidebar-footer-card">
                <div class="sidebar-footer-inner">
                    <div class="sidebar-avatar">
                        {{ substr(Auth::user()?->name ?? 'Admin', 0, 2) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold text-white truncate">{{ Auth::user()?->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-slate-400 truncate">Online CRM</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area (Offset by 240px on desktop via admin-main-content) -->
        <div class="flex-1 flex flex-col admin-main-content min-w-0">
            <!-- Compact Top Navbar (Height 62px) -->
            <header class="sticky top-0 z-30 h-[62px] min-h-[62px] bg-white/95 backdrop-blur-xl border-b border-slate-200/80 flex items-center px-4 sm:px-5 justify-between transition-shadow">
                <!-- Left: Mobile Menu & Page Breadcrumbs / Title -->
                <div class="flex items-center gap-3">
                    <button onclick="toggleSidebar()" class="md:hidden p-1.5 rounded-lg text-slate-600 hover:bg-slate-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <div>
                        <div class="flex items-center gap-1.5 text-[11px] text-slate-400 font-medium leading-none">
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition">Visava CRM</a>
                            <span>/</span>
                            <span class="text-slate-600 font-semibold">@yield('breadcrumb', 'Dashboard')</span>
                        </div>
                        <h1 class="text-lg sm:text-[22px] font-bold text-slate-900 tracking-tight leading-tight mt-0.5 font-heading">
                            @yield('header', 'Dashboard')
                        </h1>
                    </div>
                </div>

                <!-- Right Action Controls (Aligned in one clean 62px horizontal row) -->
                <div class="flex items-center gap-2 sm:gap-2.5">
                    <!-- Compact Search Bar (Height 40px, rounded 14px, icon inside) -->
                    <form method="GET" action="{{ route('admin.enquiries.index') }}" class="relative hidden lg:block m-0">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}" 
                               placeholder="Search guest, phone, email..." 
                               class="w-[220px] xl:w-[250px] h-[40px] pl-9 pr-3.5 bg-slate-100/80 hover:bg-slate-100 focus:bg-white border border-slate-200/90 focus:border-[#3B5BFE] focus:ring-2 focus:ring-[#3B5BFE]/15 text-xs rounded-[14px] outline-none transition duration-150">
                    </form>

                    <!-- Language Switch (Compact 36px Pill) -->
                    <div class="flex items-center h-[36px] bg-slate-100 p-0.5 rounded-[12px] border border-slate-200/80 text-[11px] font-bold">
                        <span class="px-2.5 py-1 rounded-[10px] bg-[#3B5BFE] text-white shadow-xs">मराठी</span>
                        <span class="px-2.5 py-1 rounded-[10px] text-slate-500 hover:text-slate-900 transition cursor-pointer">EN</span>
                    </div>

                    <!-- Notification Bell (40x40 circle, soft shadow, small red dot) -->
                    <a href="{{ route('admin.enquiries.index') }}" class="relative w-10 h-10 rounded-full bg-white border border-slate-200/80 shadow-xs flex items-center justify-center text-slate-500 hover:text-[#3B5BFE] hover:border-slate-300 transition duration-150" title="New Inquiries">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-2.5 right-2.5 w-2 h-2 rounded-full bg-rose-500 ring-2 ring-white"></span>
                    </a>

                    <!-- Admin Profile (Compact 40px Height) -->
                    <div class="hidden sm:flex items-center gap-2 h-[40px] px-3 bg-white rounded-[14px] border border-slate-200/80 shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <div class="text-left">
                            <span class="text-xs font-bold text-slate-800 block leading-tight">{{ Auth::user()?->name ?? 'Visawa Admin' }}</span>
                            <span class="text-[9.5px] text-slate-400 block leading-tight">Admin</span>
                        </div>
                    </div>

                    <!-- Logout Button (Height 40px, 14px radius outline) -->
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 h-[40px] px-3.5 bg-white hover:bg-rose-50 text-rose-600 border border-rose-300 hover:border-rose-400 text-xs font-bold rounded-[14px] transition duration-150 shadow-xs group">
                            <svg class="w-3.5 h-3.5 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Main Page Content Container (Page Padding 18px, Section Gap 14px, Full Width) -->
            <main class="flex-1 p-[18px]">
                <div class="w-full space-y-[14px]">
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