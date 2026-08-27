<!-- Bilingual Gallery Form Notice -->
<div class="p-3.5 bg-blue-50 border border-blue-200 rounded-xl text-xs text-blue-900 flex items-start gap-2.5">
    <svg class="w-4 h-4 text-blue-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
    <div>
        <span class="font-bold">सूचना (Note):</span> किमान एका भाषेत माहिती भरणे आवश्यक आहे. तुम्ही मराठी, इंग्रजी किंवा दोन्ही भाषांमध्ये माहिती भरू शकता.
        <span class="block text-[11px] text-blue-700 mt-0.5">Fill at least one language. You may enter Marathi, English, or both.</span>
    </div>
</div>

<div class="space-y-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Title Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">फोटोचे नाव / शीर्षक (मराठी)</label>
            <input type="text" name="title_mr" value="{{ old('title_mr', $gallery->title_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-emerald-500 outline-none" placeholder="उदा. द्राक्ष बाग, स्विमिंग पूल, बैलगाडी सफर">
        </div>

        <!-- Title English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Photo Title (English)</label>
            <input type="text" name="title_en" value="{{ old('title_en', $gallery->title_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-emerald-500 outline-none" placeholder="e.g. Grape Vineyards, Swimming Pool, Bullock Cart Ride">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Category Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">श्रेणी / प्रकार (मराठी)</label>
            <input type="text" name="category_mr" value="{{ old('category_mr', $gallery->category_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-emerald-500 outline-none" placeholder="उदा. शेती व निसर्ग, उपक्रम, खाद्यसंस्कृती, सोहळे">
        </div>

        <!-- Category English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Category (English)</label>
            <input type="text" name="category_en" value="{{ old('category_en', $gallery->category_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-emerald-500 outline-none" placeholder="e.g. Farm & Nature, Activities, Food, Events">
        </div>
    </div>

    <!-- Image Upload -->
    <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">Photo File (फोटो फाइल) <span class="text-rose-500">*</span></label>
        <input type="file" name="image" accept="image/*" class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
        @error('image') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror

        @if (!empty($gallery->image ?? $gallery->image_path))
            <div class="mt-3 flex items-center gap-3">
                <img src="{{ app(\App\Services\FileUploadService::class)->url($gallery->image ?? $gallery->image_path) }}" alt="Preview" class="w-20 h-14 rounded object-cover border">
                <span class="text-xs text-slate-500 font-medium">सध्याचा फोटो (Current Photo)</span>
            </div>
        @endif
    </div>

    <!-- Status -->
    <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">Status (स्थिती) <span class="text-rose-500">*</span></label>
        <select name="status" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-emerald-500 outline-none bg-white">
            <option value="active" {{ old('status', $gallery->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (सक्रिय / वेबसाइटवर प्रदर्शित करा)</option>
            <option value="inactive" {{ old('status', $gallery->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive (अक्रिय / लपवा)</option>
        </select>
    </div>
</div>
