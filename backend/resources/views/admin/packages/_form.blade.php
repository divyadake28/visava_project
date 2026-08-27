<!-- Bilingual Form Notice -->
<div class="p-3.5 bg-purple-50 border border-purple-200 rounded-xl text-xs text-purple-900 flex items-start gap-2.5">
    <svg class="w-4 h-4 text-purple-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
    <div>
        <span class="font-bold">सूचना (Note):</span> किमान एका भाषेत माहिती भरणे आवश्यक आहे. तुम्ही मराठी, इंग्रजी किंवा दोन्ही भाषांमध्ये माहिती भरू शकता.
        <span class="block text-[11px] text-purple-700 mt-0.5">Fill at least one language. You may enter Marathi, English, or both.</span>
    </div>
</div>

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Title Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">पॅकेज नाव (मराठी)</label>
            <input type="text" name="title_mr" value="{{ old('title_mr', $package->title_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_mr') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-purple-500 outline-none" placeholder="उदा. फॅमिली वीकेंड स्टे पॅकेज">
            @error('title_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Title English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Package Name (English)</label>
            <input type="text" name="title_en" value="{{ old('title_en', $package->title_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_en') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-purple-500 outline-none" placeholder="e.g. Family Weekend Stay Package">
            @error('title_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Price -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">किंमत (Regular Price in ₹) <span class="text-rose-500">*</span></label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $package->price ?? '') }}" required class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-purple-500 outline-none" placeholder="1500.00">
            @error('price') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Discounted Price -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">सवलत किंमत (Discounted Price in ₹)</label>
            <input type="number" step="0.01" name="discounted_price" value="{{ old('discounted_price', $package->discounted_price ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-purple-500 outline-none" placeholder="1200.00">
            @error('discounted_price') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Duration Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">कालावधी (मराठी)</label>
            <input type="text" name="duration_mr" value="{{ old('duration_mr', $package->duration_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-purple-500 outline-none" placeholder="उदा. १ दिवस / १ रात्र">
        </div>

        <!-- Duration English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Duration (English)</label>
            <input type="text" name="duration_en" value="{{ old('duration_en', $package->duration_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-purple-500 outline-none" placeholder="e.g. 1 Day / 1 Night">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Short Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">संक्षिप्त वैशिष्ट्ये (मराठी)</label>
            <textarea name="short_description_mr" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-purple-500 outline-none" placeholder="पॅकेजचे मुख्य आकर्षण...">{{ old('short_description_mr', $package->short_description_mr ?? '') }}</textarea>
        </div>

        <!-- Short Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Short Highlights (English)</label>
            <textarea name="short_description_en" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-purple-500 outline-none" placeholder="Key package highlights...">{{ old('short_description_en', $package->short_description_en ?? '') }}</textarea>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">संपूर्ण पॅकेज तपशील (मराठी)</label>
            <textarea name="description_mr" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('description_mr') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-purple-500 outline-none">{{ old('description_mr', $package->description_mr ?? '') }}</textarea>
            @error('description_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Full Package Details (English)</label>
            <textarea name="description_en" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('description_en') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-purple-500 outline-none">{{ old('description_en', $package->description_en ?? '') }}</textarea>
            @error('description_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
        <!-- Featured Image -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Featured Package Image (इमेज)</label>
            <input type="file" name="featured_image" accept="image/*" class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
            @if (!empty($package->featured_image))
                <div class="mt-2 flex items-center gap-2">
                    <img src="{{ app(\App\Services\FileUploadService::class)->url($package->featured_image) }}" alt="Preview" class="w-16 h-12 rounded object-cover border">
                    <span class="text-[11px] text-slate-500">Current Image</span>
                </div>
            @endif
        </div>

        <!-- Status -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Status (स्थिती) <span class="text-rose-500">*</span></label>
            <select name="status" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-purple-500 outline-none bg-white">
                <option value="active" {{ old('status', $package->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (सक्रिय)</option>
                <option value="inactive" {{ old('status', $package->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive (अक्रिय)</option>
            </select>
        </div>
    </div>
</div>