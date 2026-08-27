<!-- Bilingual Form Notice -->
<div class="p-3.5 bg-indigo-50 border border-indigo-200 rounded-xl text-xs text-indigo-900 flex items-start gap-2.5">
    <svg class="w-4 h-4 text-indigo-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
    <div>
        <span class="font-bold">सूचना (Note):</span> किमान एका भाषेत माहिती भरणे आवश्यक आहे. तुम्ही मराठी, इंग्रजी किंवा दोन्ही भाषांमध्ये माहिती भरू शकता.
        <span class="block text-[11px] text-indigo-700 mt-0.5">Fill at least one language. You may enter Marathi, English, or both.</span>
    </div>
</div>

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Title Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">इव्हेंट शीर्षक (मराठी)</label>
            <input type="text" name="title_mr" value="{{ old('title_mr', $event->title_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_mr') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-indigo-500 outline-none" placeholder="उदा. मान्सून वॉटर कार्निव्हल">
            @error('title_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Title English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Event Title (English)</label>
            <input type="text" name="title_en" value="{{ old('title_en', $event->title_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_en') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-indigo-500 outline-none" placeholder="e.g. Monsoon Water Carnival">
            @error('title_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Event Date -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">इव्हेंट तारीख व वेळ <span class="text-rose-500">*</span></label>
            <input type="datetime-local" name="event_date" value="{{ old('event_date', isset($event->event_date) ? $event->event_date->format('Y-m-d\TH:i') : (isset($event->start_date) ? $event->start_date->format('Y-m-d\TH:i') : '')) }}" required class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-indigo-500 outline-none">
            @error('event_date') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Location Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">स्थान (मराठी)</label>
            <input type="text" name="location_mr" value="{{ old('location_mr', $event->location_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-indigo-500 outline-none" placeholder="उदा. वॉटर पार्क एरिना">
        </div>

        <!-- Location English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Location (English)</label>
            <input type="text" name="location_en" value="{{ old('location_en', $event->location_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-indigo-500 outline-none" placeholder="e.g. Water Park Arena">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Short Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">संक्षिप्त माहिती (मराठी)</label>
            <textarea name="short_description_mr" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-indigo-500 outline-none" placeholder="संक्षिप्त सारांश...">{{ old('short_description_mr', $event->short_description_mr ?? '') }}</textarea>
        </div>

        <!-- Short Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Short Description (English)</label>
            <textarea name="short_description_en" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-indigo-500 outline-none" placeholder="Brief summary...">{{ old('short_description_en', $event->short_description_en ?? '') }}</textarea>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">संपूर्ण इव्हेंट माहिती (मराठी)</label>
            <textarea name="description_mr" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('description_mr') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-indigo-500 outline-none">{{ old('description_mr', $event->description_mr ?? '') }}</textarea>
            @error('description_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Full Event Description (English)</label>
            <textarea name="description_en" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('description_en') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-indigo-500 outline-none">{{ old('description_en', $event->description_en ?? '') }}</textarea>
            @error('description_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
        <!-- Image -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Event Image (इव्हेंट पोस्टर / बॅनर)</label>
            <input type="file" name="image" accept="image/*" class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @if (!empty($event->image ?? $event->banner_image))
                <div class="mt-2 flex items-center gap-2">
                    <img src="{{ app(\App\Services\FileUploadService::class)->url($event->image ?? $event->banner_image) }}" alt="Preview" class="w-16 h-12 rounded object-cover border">
                    <span class="text-[11px] text-slate-500">Current Image</span>
                </div>
            @endif
        </div>

        <!-- Status -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Status (स्थिती) <span class="text-rose-500">*</span></label>
            <select name="status" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-indigo-500 outline-none bg-white">
                <option value="active" {{ old('status', $event->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (सक्रिय)</option>
                <option value="inactive" {{ old('status', $event->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive (अक्रिय)</option>
            </select>
        </div>
    </div>
</div>