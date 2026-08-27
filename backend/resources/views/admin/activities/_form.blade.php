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
            <label class="block text-xs font-bold text-slate-700 mb-1">अनुभव / उपक्रम नाव (मराठी)</label>
            <input type="text" name="title_mr" value="{{ old('title_mr', $activity->title_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_mr') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-blue-500 outline-none" placeholder="उदा. वॉटर पार्क व स्लाइड्स">
            @error('title_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Title English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Activity / Experience Name (English)</label>
            <input type="text" name="title_en" value="{{ old('title_en', $activity->title_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_en') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-blue-500 outline-none" placeholder="e.g. Water Park & Slides">
            @error('title_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Icon / Emoji -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">चिन्ह / चिन्हक (Icon or Emoji)</label>
            <input type="text" name="icon" value="{{ old('icon', $activity->icon ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none" placeholder="उदा. 🌊 किंवा rides">
            @error('icon') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Sort Order -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">क्रमवारी (Sort Order)</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $activity->sort_order ?? 0) }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none" placeholder="0">
            @error('sort_order') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">स्थिती (Status)</label>
            <select name="is_active" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none bg-white">
                <option value="1" {{ old('is_active', $activity->is_active ?? true) ? 'selected' : '' }}>सक्रिय (Active)</option>
                <option value="0" {{ !old('is_active', $activity->is_active ?? true) ? 'selected' : '' }}>अक्रिय (Inactive)</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Short Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">संक्षिप्त वर्णन (मराठी)</label>
            <textarea name="short_description_mr" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none" placeholder="थोडक्यात आकर्षण किंवा माहिती...">{{ old('short_description_mr', $activity->short_description_mr ?? '') }}</textarea>
        </div>

        <!-- Short Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Short Description (English)</label>
            <textarea name="short_description_en" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none" placeholder="Short highlight or summary...">{{ old('short_description_en', $activity->short_description_en ?? '') }}</textarea>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Full Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">संपूर्ण तपशील (मराठी)</label>
            <textarea name="description_mr" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none" placeholder="अनुभव व उपक्रमाचा सविस्तर तपशील...">{{ old('description_mr', $activity->description_mr ?? '') }}</textarea>
        </div>

        <!-- Full Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Full Description (English)</label>
            <textarea name="description_en" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 outline-none" placeholder="Detailed description of the experience or activity...">{{ old('description_en', $activity->description_en ?? '') }}</textarea>
        </div>
    </div>

    <!-- Image Upload -->
    <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">छायाचित्र (Activity Image)</label>
        <input type="file" name="image" accept="image/*" class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        @error('image') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        @if (!empty($activity->image))
            <div class="mt-2 flex items-center gap-2">
                <img src="{{ app(\App\Services\FileUploadService::class)->url($activity->image) }}" alt="Preview" class="w-20 h-14 rounded-lg object-cover border">
                <span class="text-[11px] text-slate-500">Current Image</span>
            </div>
        @endif
    </div>
</div>