@extends('admin.layouts.app')

@section('breadcrumb', 'Dining & Menus')
@section('header', 'Dining & Village Flavors (गावरान खाद्यसंस्कृती)')

@section('content')
<div class="space-y-5 pb-12">
    <!-- 1. Page Intro Card -->
    <div class="saas-card bg-white p-5 sm:p-6 rounded-2xl border border-slate-200/90 shadow-sm flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div class="space-y-1">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-amber-50 border border-amber-200/80 flex items-center justify-center text-lg shrink-0 shadow-2xs">
                    🍽️
                </div>
                <h2 class="text-base sm:text-lg font-bold text-slate-900 font-heading tracking-tight">
                    गावरान खाद्यसंस्कृती मेनू व्यवस्थापन <span class="text-xs sm:text-sm font-semibold text-slate-500 font-sans ml-1">(Dining & Menus)</span>
                </h2>
            </div>
            <p class="text-xs text-slate-500 pl-0 sm:pl-11 leading-relaxed">
                अस्सल चुलीवरचे जेवण, गावरान थाळी, सकाळचा नाश्ता आणि खास पदार्थांची संपूर्ण यादी
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5 shrink-0 self-start lg:self-center">
            <a 
                href="http://127.0.0.1:4200/#dining-showcase" 
                target="_blank" 
                rel="noopener noreferrer"
                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-slate-50 hover:bg-slate-100 text-slate-700 font-bold text-xs rounded-xl border border-slate-200/90 hover:border-slate-300 transition duration-150 shadow-2xs">
                <span>संकेतस्थळ पहा (Preview)</span>
                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>

            <a 
                href="{{ route('admin.dining.create') }}" 
                style="background-color: #2563EB !important; color: #FFFFFF !important;"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-sm hover:shadow transition duration-150 cursor-pointer">
                <svg class="w-4 h-4 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>+ नवीन खाद्य मेनू जोडा (Add Dining Item)</span>
            </a>
        </div>
    </div>

    <!-- 2. Metric KPI Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        <!-- Card 1: Total Dining Menus -->
        <div class="saas-card p-5 relative overflow-hidden bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider block">एकूण मेनू (Total Menus)</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-1 font-heading">{{ $stats['total'] ?? $diningItems->total() }}</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">Configured dishes & feasts</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-amber-50 border border-amber-200/70 flex items-center justify-center text-xl text-amber-600 shadow-xs shrink-0">
                    🍽️
                </div>
            </div>
            <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                <span>Farm-to-table cuisine</span>
                <span class="font-bold text-amber-600">गावरान चव</span>
            </div>
        </div>

        <!-- Card 2: Live on Website -->
        <div class="saas-card p-5 relative overflow-hidden bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider block">सक्रिय मेनू (Live Active)</span>
                    <h3 class="text-2xl font-black text-emerald-700 mt-1 font-heading">{{ $stats['active'] ?? 0 }}</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">Visible on guest website</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-200/70 flex items-center justify-center text-xl text-emerald-600 shadow-xs shrink-0">
                    🌿
                </div>
            </div>
            <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center gap-1.5 text-[11px] text-emerald-700 font-semibold">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Active & published</span>
            </div>
        </div>

        <!-- Card 3: Categories -->
        <div class="saas-card p-5 relative overflow-hidden bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider block">खाद्य श्रेणी (Categories)</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-1 font-heading">{{ $stats['categories_count'] ?? 1 }}</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">Thali, Misal, Breakfast, High Tea</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-200/70 flex items-center justify-center text-xl text-blue-600 shadow-xs shrink-0">
                    🏷️
                </div>
            </div>
            <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                <span>Organized groups</span>
                <span class="font-bold text-blue-600">विविध चव</span>
            </div>
        </div>

        <!-- Card 4: Special Highlights -->
        <div class="saas-card p-5 relative overflow-hidden bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider block">खास आकर्षणे (Featured)</span>
                    <h3 class="text-2xl font-black text-amber-700 mt-1 font-heading">{{ $stats['featured_count'] ?? 0 }}</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">With badge highlights</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-orange-50 border border-orange-200/70 flex items-center justify-center text-xl text-orange-600 shadow-xs shrink-0">
                    ✨
                </div>
            </div>
            <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px] text-amber-700 font-semibold">
                <span>Special badges enabled</span>
                <span>🔥 खास आकर्षण</span>
            </div>
        </div>
    </div>

    <!-- 3. Filter / Search Toolbar -->
    <div class="saas-card p-4 sm:p-5 bg-white rounded-2xl border border-slate-200/90 shadow-sm">
        <form method="GET" action="{{ route('admin.dining.index') }}" class="flex flex-col lg:flex-row lg:items-center justify-between gap-3 m-0">
            
            <!-- Filters Form (Left) -->
            <div class="flex flex-wrap lg:flex-nowrap items-center gap-2.5 sm:gap-3 flex-1">
                <!-- Search Input -->
                <div class="relative flex-1 min-w-[200px] max-w-xs">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search by title, ingredient, badge..." 
                        class="w-full pl-9 pr-3.5 py-2.5 text-xs rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none bg-slate-50/50 hover:bg-white focus:bg-white transition text-slate-900 placeholder:text-slate-400">
                </div>

                <!-- Category Filter -->
                @if(isset($categories) && $categories->isNotEmpty())
                    <select 
                        name="category" 
                        style="min-width: 195px;"
                        class="px-3.5 py-2.5 text-xs rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none bg-slate-50/50 hover:bg-white focus:bg-white text-slate-700 font-medium transition cursor-pointer shrink-0">
                        <option value="">सर्व खाद्य वर्ग (All Categories)</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                @endif

                <!-- Status Filter -->
                <select 
                    name="status" 
                    style="min-width: 155px;"
                    class="px-3.5 py-2.5 text-xs rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none bg-slate-50/50 hover:bg-white focus:bg-white text-slate-700 font-medium transition cursor-pointer shrink-0">
                    <option value="">सर्व स्थिती (All Status)</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>🟢 Active (सक्रिय)</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>⚪ Inactive (अक्रिय)</option>
                </select>

                <!-- Filter Submit Button -->
                <button 
                    type="submit" 
                    class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl shadow-xs transition flex items-center gap-1.5 cursor-pointer shrink-0">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    <span>Filter</span>
                </button>

                @if(request()->hasAny(['search', 'category', 'status']))
                    <a 
                        href="{{ route('admin.dining.index') }}" 
                        class="px-3 py-2.5 text-xs font-semibold text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-xl transition inline-flex items-center gap-1 shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        <span>Clear</span>
                    </a>
                @endif
            </div>

            <!-- Items Counter Badge (Right) -->
            <div class="flex items-center gap-2 shrink-0 self-start lg:self-center">
                <span class="px-3.5 py-2 rounded-xl bg-slate-100 text-xs font-bold text-slate-700 border border-slate-200/80 shadow-2xs">
                    {{ $diningItems->total() }} मेनू उपलब्ध (Dishes)
                </span>
            </div>
        </form>
    </div>


    <!-- 4. Main Dining Table Card -->
    <div class="saas-card bg-white rounded-2xl border border-slate-200/90 shadow-sm overflow-hidden">
        @if ($diningItems->isEmpty())
            <div class="py-20 text-center text-slate-400 space-y-4">
                <div class="w-20 h-20 mx-auto rounded-3xl bg-amber-50 border border-amber-200/70 flex items-center justify-center text-4xl shadow-inner">
                    🍽️
                </div>
                <div class="space-y-1">
                    <h3 class="text-base font-bold text-slate-800 font-heading">कोणतेही खाद्य मेनू आढळले नाहीत (No Dining Items Found)</h3>
                    <p class="text-xs text-slate-500 max-w-md mx-auto">
                        @if(request()->hasAny(['search', 'category', 'status']))
                            तुमच्या फिल्टरनुसार कोणताही पदार्थ सापडला नाही. कृपया फिल्टर रीसेट करा.
                        @else
                            अस्सल गावरान जेवण, चुलीवरची मिसळ, नाश्ता किंवा शेतातील ताज्या पदार्थांचे मेनू जोडा.
                        @endif
                    </p>
                </div>
                <div class="pt-2">
                    @if(request()->hasAny(['search', 'category', 'status']))
                        <a href="{{ route('admin.dining.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl shadow-xs transition">
                            <span>सर्व मेनू पहा (Reset Filters)</span>
                        </a>
                    @else
                        <a href="{{ route('admin.dining.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold rounded-xl shadow-md transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            <span>पहिला खाद्य मेनू जोडा (+ Create First Dining Item)</span>
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200/80 text-sm text-left">
                    <thead class="bg-slate-50/90 text-[11px] font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200/80">
                        <tr>
                            <th scope="col" class="px-6 py-4">Image (फोटो)</th>
                            <th scope="col" class="px-6 py-4">Dish / Menu Title (पदार्थ व नाव)</th>
                            <th scope="col" class="px-6 py-4">Badge & Icon (हायलाइट)</th>
                            <th scope="col" class="px-6 py-4">Category (श्रेणी)</th>
                            <th scope="col" class="px-6 py-4 text-center">Order (क्रम)</th>
                            <th scope="col" class="px-6 py-4">Status (स्थिती)</th>
                            <th scope="col" class="px-6 py-4 text-right">Actions (कृती)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($diningItems as $item)
                            <tr class="hover:bg-amber-50/25 transition-colors group">
                                
                                <!-- Image Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="relative w-20 h-14 rounded-xl overflow-hidden border border-slate-200/90 shadow-xs bg-slate-100 shrink-0 group-hover:shadow-sm transition-all">
                                        @if ($item->image)
                                            <img 
                                                src="{{ app(\App\Services\FileUploadService::class)->url($item->image) }}" 
                                                alt="{{ $item->title_en }}" 
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 text-[10px] font-medium bg-slate-50">
                                                <span>🍽️</span>
                                                <span>No Image</span>
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <!-- Title Column -->
                                <td class="px-6 py-4">
                                    <div class="max-w-xs sm:max-w-sm space-y-0.5">
                                        <div class="font-bold text-slate-900 group-hover:text-amber-700 transition leading-snug text-sm">
                                            {{ $item->title_mr ?: $item->title_en }}
                                        </div>
                                        @if($item->title_en && $item->title_mr)
                                            <div class="text-xs text-slate-500 font-medium">
                                                {{ $item->title_en }}
                                            </div>
                                        @endif
                                        @if($item->short_description_mr || $item->short_description_en)
                                            <p class="text-[11px] text-slate-400 line-clamp-1 leading-relaxed">
                                                {{ $item->short_description_mr ?: $item->short_description_en }}
                                            </p>
                                        @endif
                                    </div>
                                </td>

                                <!-- Badge & Icon Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($item->badge_mr || $item->badge_en)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-900 border border-amber-200/80 shadow-2xs">
                                            <span class="text-sm">{{ $item->badge_icon ?: '🍽️' }}</span>
                                            <span>{{ $item->badge_mr ?: $item->badge_en }}</span>
                                        </span>
                                    @else
                                        <span class="text-slate-300 text-xs font-bold">—</span>
                                    @endif
                                </td>

                                <!-- Category Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="space-y-1">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-semibold border border-slate-200/60">
                                            <span>🏷️</span>
                                            <span>{{ $item->category_mr ?: ($item->category_en ?: 'General') }}</span>
                                        </span>
                                        @if($item->dietary_type)
                                            <div class="text-[11px] text-emerald-700 font-medium flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                <span>{{ $item->dietary_type === 'pure_veg' ? '१००% शाकाहारी' : ($item->dietary_type === 'village_style' ? 'गावरान चव' : 'जैन उपलब्ध') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <!-- Sort Order Column -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-slate-100 text-xs font-black text-slate-700 border border-slate-200/70 shadow-2xs">
                                        {{ $item->sort_order }}
                                    </span>
                                </td>

                                <!-- Status Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($item->status === 'active' || $item->is_active)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-200 shadow-2xs">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            <span>Active (सक्रिय)</span>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200 shadow-2xs">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                            <span>Inactive (अक्रिय)</span>
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions Column -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <!-- View Button -->
                                        <a 
                                            href="{{ route('admin.dining.show', $item) }}" 
                                            title="तपशील पहा (View Details)"
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-blue-50 hover:bg-blue-600 text-blue-600 hover:text-white border border-blue-200/70 hover:border-blue-600 shadow-2xs transition-all duration-150">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </a>

                                        <!-- Edit Button -->
                                        <a 
                                            href="{{ route('admin.dining.edit', $item) }}" 
                                            title="संपादन करा (Edit Item)"
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-amber-50 hover:bg-amber-600 text-amber-700 hover:text-white border border-amber-200/70 hover:border-amber-600 shadow-2xs transition-all duration-150">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>

                                        <!-- Delete Button Form -->
                                        <form 
                                            action="{{ route('admin.dining.destroy', $item) }}" 
                                            method="POST" 
                                            class="inline" 
                                            onsubmit="return confirm('खात्री करा: तुम्हाला हा खाद्य मेनू काढून टाकायचा आहे का? (Are you sure you want to delete this dining item? {{ $item->title_mr ?: $item->title_en }})');">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                title="काढून टाका (Delete Item)"
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white border border-rose-200/70 hover:border-rose-600 shadow-2xs transition-all duration-150 cursor-pointer">
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

            <!-- Pagination Bar -->
            @if($diningItems->hasPages())
                <div class="p-4 sm:p-5 border-t border-slate-100 bg-slate-50/50 flex items-center justify-between">
                    <div class="text-xs text-slate-500 font-medium">
                        Showing {{ $diningItems->firstItem() }} to {{ $diningItems->lastItem() }} of {{ $diningItems->total() }} dining items
                    </div>
                    <div>
                        {{ $diningItems->links() }}
                    </div>
                </div>
            @endif
        @endif
    </div>

</div>
@endsection

