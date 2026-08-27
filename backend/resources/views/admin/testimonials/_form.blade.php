<!-- Bilingual Form Notice -->
<div class="p-3.5 bg-amber-50 border border-amber-200 rounded-xl text-xs text-amber-900 flex items-start gap-2.5">
    <svg class="w-4 h-4 text-amber-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
    <div>
        <span class="font-bold">सूचना (Note):</span> किमान एका भाषेत माहिती भरणे आवश्यक आहे. तुम्ही मराठी, इंग्रजी किंवा दोन्ही भाषांमध्ये माहिती भरू शकता.
        <span class="block text-[11px] text-amber-700 mt-0.5">Fill at least one language. You may enter Marathi, English, or both.</span>
    </div>
</div>

<div class="space-y-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Client Name -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">ग्राहकाचे नाव (Client Name) <span class="text-rose-500">*</span></label>
            <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name ?? $testimonial->name ?? '') }}" required class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="उदा. राहुल शर्मा">
            @error('client_name') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Rating -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Star Rating (१ ते ५ स्टार) <span class="text-rose-500">*</span></label>
            <select name="rating" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none bg-white">
                @for ($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>★ {{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Designation Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">हुद्दा / शहर (मराठी)</label>
            <input type="text" name="client_designation_mr" value="{{ old('client_designation_mr', $testimonial->client_designation_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="उदा. पर्यटक, पुणे">
        </div>

        <!-- Designation English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Designation / City (English)</label>
            <input type="text" name="client_designation_en" value="{{ old('client_designation_en', $testimonial->client_designation_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="e.g. Tourist, Pune">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Review Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">अभिप्राय / रिव्ह्यू (मराठी)</label>
            <textarea name="review_mr" rows="4" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('review_mr') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-amber-500 outline-none" placeholder="ग्राहकाचा मराठी अनुभव...">{{ old('review_mr', $testimonial->review_mr ?? $testimonial->comment ?? '') }}</textarea>
            @error('review_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Review English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Customer Review (English)</label>
            <textarea name="review_en" rows="4" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('review_en') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-amber-500 outline-none" placeholder="Customer review in English...">{{ old('review_en', $testimonial->review_en ?? '') }}</textarea>
            @error('review_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
        <!-- Client Avatar -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Client Avatar (फोटो)</label>
            <input type="file" name="client_image" accept="image/*" class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            @if (!empty($testimonial->client_image ?? $testimonial->avatar))
                <div class="mt-2 flex items-center gap-2">
                    <img src="{{ app(\App\Services\FileUploadService::class)->url($testimonial->client_image ?? $testimonial->avatar) }}" alt="Preview" class="w-10 h-10 rounded-full object-cover border">
                    <span class="text-[11px] text-slate-500">Current Avatar</span>
                </div>
            @endif
        </div>

        <!-- Status -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Status (स्थिती) <span class="text-rose-500">*</span></label>
            <select name="status" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none bg-white">
                <option value="active" {{ old('status', $testimonial->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (मंजूर / Approved)</option>
                <option value="inactive" {{ old('status', $testimonial->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive (प्रलंबित / Pending)</option>
            </select>
        </div>
    </div>
</div>