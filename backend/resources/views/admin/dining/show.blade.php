@extends('admin.layouts.app')

@section('breadcrumb')
    <a href="{{ route('admin.dining.index') }}" class="hover:underline">Dining & Menus</a> / तपशील (Details)
@endsection

@section('header', 'खाद्य मेनू तपशील (Dining Item Details)')

@section('content')
<div class="max-w-4xl space-y-6">

    <div class="saas-card bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <!-- Photo Banner -->
        @if($dining->image)
            <div class="h-64 sm:h-96 w-full overflow-hidden relative bg-slate-900 group">
                <img 
                    src="{{ app(\App\Services\FileUploadService::class)->url($dining->image) }}" 
                    alt="{{ $dining->title_en }}" 
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/30"></div>

                @if($dining->badge_mr || $dining->badge_en)
                    <div class="absolute top-5 left-5 px-4 py-1.5 bg-amber-500 text-slate-950 text-xs font-black rounded-full shadow-xl flex items-center gap-1.5">
                        <span class="text-sm">{{ $dining->badge_icon ?: '🍽️' }}</span>
                        <span>{{ $dining->badge_mr ?: $dining->badge_en }}</span>
                    </div>
                @endif

                <div class="absolute bottom-5 left-6 right-6 text-white">
                    <span class="text-xs font-bold text-amber-300 uppercase tracking-wider block">
                        {{ $dining->category_mr ?: $dining->category_en }}
                    </span>
                    <h1 class="text-2xl sm:text-3xl font-black font-heading mt-1 text-white drop-shadow-md">
                        {{ $dining->title_mr }}
                    </h1>
                    @if($dining->title_en)
                        <p class="text-sm text-slate-200 font-medium drop-shadow-xs">{{ $dining->title_en }}</p>
                    @endif
                </div>
            </div>
        @endif

        <div class="p-6 sm:p-8 space-y-6">
            <!-- Header with Status & Order (if no image) -->
            @if(!$dining->image)
                <div class="flex items-start justify-between gap-4 border-b border-slate-100 pb-5">
                    <div>
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-wider block">
                            {{ $dining->category_mr ?: $dining->category_en }}
                        </span>
                        <h2 class="text-2xl font-black text-slate-900 font-heading mt-1">{{ $dining->title_mr }}</h2>
                        <p class="text-sm font-semibold text-slate-500 mt-0.5">{{ $dining->title_en }}</p>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        @if($dining->status === 'active' || $dining->is_active)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>Active</span>
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                <span>Inactive</span>
                            </span>
                        @endif
                        <span class="px-3 py-1 bg-slate-100 rounded-xl text-xs font-bold text-slate-700 border border-slate-200/60">
                            Order #{{ $dining->sort_order }}
                        </span>
                    </div>
                </div>
            @endif

            <!-- Metadata Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/70">
                    <span class="text-slate-400 font-bold uppercase block text-[10px] tracking-wider">वर्ग / Category</span>
                    <span class="text-slate-900 font-bold text-sm mt-1 block">
                        {{ $dining->category_mr }} / {{ $dining->category_en }}
                    </span>
                </div>
                <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/70">
                    <span class="text-slate-400 font-bold uppercase block text-[10px] tracking-wider">आहार प्रकार / Dietary</span>
                    <span class="text-slate-900 font-bold text-sm mt-1 block">
                        {{ $dining->dietary_type === 'pure_veg' ? '१००% शुद्ध शाकाहारी (Pure Veg)' : ($dining->dietary_type === 'village_style' ? 'अस्सल गावरान चव (Village Style)' : 'जैन जेवण उपलब्ध (Jain Available)') }}
                    </span>
                </div>
                <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-200/70">
                    <span class="text-slate-400 font-bold uppercase block text-[10px] tracking-wider">स्थिती व क्रम (Status & Order)</span>
                    <div class="flex items-center gap-2 mt-1">
                        @if($dining->status === 'active' || $dining->is_active)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>Active</span>
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-200 text-slate-700">
                                <span>Inactive</span>
                            </span>
                        @endif
                        <span class="font-bold text-slate-700 text-xs">Order: #{{ $dining->sort_order }}</span>
                    </div>
                </div>
            </div>

            <!-- Descriptions -->
            <div class="space-y-4 pt-2">
                @if($dining->short_description_mr)
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">संक्षिप्त माहिती / वैशिष्ट्ये (मराठी)</h3>
                        <div class="text-sm text-slate-700 leading-relaxed bg-slate-50/80 p-4 rounded-2xl border border-slate-200/70">
                            {{ $dining->short_description_mr }}
                        </div>
                    </div>
                @endif

                @if($dining->short_description_en)
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Description & Highlights (English)</h3>
                        <div class="text-sm text-slate-700 leading-relaxed bg-slate-50/80 p-4 rounded-2xl border border-slate-200/70">
                            {{ $dining->short_description_en }}
                        </div>
                    </div>
                @endif
            </div>

            <!-- Footer Actions -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                <a href="{{ route('admin.dining.index') }}" class="text-xs font-bold text-slate-600 hover:text-slate-900 transition flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span>सर्व मेनूवर परत जा (Back to List)</span>
                </a>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.dining.edit', $dining) }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        <span>संपादित करा (Edit Dining Item)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

