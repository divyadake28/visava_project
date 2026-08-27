<!-- Bilingual Form Notice -->
<div class="p-3.5 bg-blue-50 border border-blue-200 rounded-xl text-xs text-blue-900 flex items-start gap-2.5">
    <svg class="w-4 h-4 text-blue-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
    <div>
        <span class="font-bold">सूचना (Note):</span> किमान एका भाषेत माहिती भरणे आवश्यक आहे. तुम्ही मराठी, इंग्रजी किंवा दोन्ही भाषांमध्ये माहिती भरू शकता.
        <span class="block text-[11px] text-blue-700 mt-0.5">Fill at least one language. You may enter Marathi, English, or both.</span>
    </div>
</div>

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Title Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">ब्लॉग शीर्षक (मराठी)</label>
            <input type="text" name="title_mr" value="{{ old('title_mr', $blog->title_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_mr') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-blue-500 outline-none" placeholder="उदा. विसावा रिसॉर्टमधील मुख्य आकर्षणे">
            @error('title_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Title English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Blog Title (English)</label>
            <input type="text" name="title_en" value="{{ old('title_en', $blog->title_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_en') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-blue-500 outline-none" placeholder="e.g. Top Attractions at Visava Resort">
            @error('title_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Short Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">संक्षिप्त माहिती (मराठी)</label>
            <textarea name="short_description_mr" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none" placeholder="संक्षिप्त सारांश...">{{ old('short_description_mr', $blog->short_description_mr ?? '') }}</textarea>
        </div>

        <!-- Short Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Short Description (English)</label>
            <textarea name="short_description_en" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none" placeholder="Brief summary...">{{ old('short_description_en', $blog->short_description_en ?? '') }}</textarea>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Full Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">संपूर्ण ब्लॉग मजकूर (मराठी)</label>
            <textarea name="description_mr" rows="6" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('description_mr') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-blue-500 outline-none" placeholder="सविस्तर ब्लॉग लेख...">{{ old('description_mr', $blog->description_mr ?? '') }}</textarea>
            @error('description_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Full Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Full Blog Content (English)</label>
            <textarea name="description_en" rows="6" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('description_en') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-blue-500 outline-none" placeholder="Detailed blog article...">{{ old('description_en', $blog->description_en ?? '') }}</textarea>
            @error('description_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
        <!-- Featured Image -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Featured Image (बॅनर इमेज)</label>
            <input type="file" name="featured_image" accept="image/*" class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            @if (!empty($blog->featured_image))
                <div class="mt-2 flex items-center gap-2">
                    <img src="{{ app(\App\Services\FileUploadService::class)->url($blog->featured_image) }}" alt="Preview" class="w-16 h-12 rounded object-cover border">
                    <span class="text-[11px] text-slate-500">Current Image</span>
                </div>
            @endif
        </div>

        <!-- Status -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Status (स्थिती) <span class="text-rose-500">*</span></label>
            <select name="status" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none bg-white">
                <option value="active" {{ old('status', $blog->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (सक्रिय - प्रकाशित)</option>
                <option value="inactive" {{ old('status', $blog->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive (अप्रकाशित / Draft)</option>
            </select>
        </div>
    </div>
</div>