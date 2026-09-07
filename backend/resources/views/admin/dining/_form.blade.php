<!-- Bilingual Form Notice -->
<div class="p-3.5 bg-amber-50/80 border border-amber-200 rounded-xl text-xs text-amber-950 flex items-start gap-2.5">
    <span class="text-base leading-none">🍽️</span>
    <div>
        <span class="font-bold">गावरान खाद्यसंस्कृती (Authentic Village Dining):</span> किमान एका भाषेत नाव भरणे आवश्यक आहे. तुम्ही मराठी, इंग्रजी किंवा दोन्ही भाषांमध्ये माहिती भरू शकता.
        <span class="block text-[11px] text-amber-800 mt-0.5">Fill in at least one language. Content will automatically switch on the website based on language selection.</span>
    </div>
</div>

<div class="space-y-6">
    <!-- Row 1: Titles -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Title Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">पदार्थाचे / मेनूचे नाव (मराठी) <span class="text-rose-500">*</span></label>
            <input type="text" name="title_mr" value="{{ old('title_mr', $dining->title_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_mr') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-amber-500 outline-none" placeholder="उदा. अस्सल गावरान थाळी">
            @error('title_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Title English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Dish / Menu Name (English) <span class="text-rose-500">*</span></label>
            <input type="text" name="title_en" value="{{ old('title_en', $dining->title_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border {{ $errors->has('title_en') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-300' }} focus:border-amber-500 outline-none" placeholder="e.g. Authentic Gavran Thali & Feasts">
            @error('title_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <!-- Row 2: Badge & Icon -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Badge Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">हायलाइट बॅज (मराठी)</label>
            <input type="text" name="badge_mr" value="{{ old('badge_mr', $dining->badge_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="उदा. अस्सल जेवण, खास आकर्षण">
            @error('badge_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Badge English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Highlight Badge (English)</label>
            <input type="text" name="badge_en" value="{{ old('badge_en', $dining->badge_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="e.g. Gavran Lunch, Specials">
            @error('badge_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Badge Icon & Quick Pickers -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">बॅज आयकॉन / इमोजी (Badge Icon)</label>
            <div class="flex items-center gap-2">
                <input type="text" id="badge_icon_input" name="badge_icon" value="{{ old('badge_icon', $dining->badge_icon ?? '🍛') }}" class="w-20 text-center text-lg px-2 py-2 rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="🍛">
                <div class="flex flex-wrap gap-1">
                    @foreach(['🍛', '🌅', '🔥', '☕', '🍍', '👨‍👩‍👧‍👦', '🌾', '🥣'] as $emoji)
                        <button type="button" onclick="document.getElementById('badge_icon_input').value='{{ $emoji }}'" class="w-8 h-8 rounded-lg bg-slate-100 hover:bg-amber-100 hover:border-amber-300 border border-slate-200 text-sm flex items-center justify-center transition">
                            {{ $emoji }}
                        </button>
                    @endforeach
                </div>
            </div>
            @error('badge_icon') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <!-- Row 3: Category (MR/EN) & Dietary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Category Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">प्रवर्ग / श्रेणी (मराठी)</label>
            <input type="text" name="category_mr" value="{{ old('category_mr', $dining->category_mr ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="उदा. दुपारचे जेवण, नाश्ता, शेतातील फळे">
            @error('category_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Category English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Category (English)</label>
            <input type="text" name="category_en" value="{{ old('category_en', $dining->category_en ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="e.g. Lunch & Dinner, Breakfast, Specials">
            @error('category_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Dietary Type -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">आहार प्रकार (Dietary Type)</label>
            <select name="dietary_type" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none bg-white">
                <option value="pure_veg" {{ old('dietary_type', $dining->dietary_type ?? 'pure_veg') === 'pure_veg' ? 'selected' : '' }}>🟢 १००% शुद्ध शाकाहारी (100% Pure Veg)</option>
                <option value="village_style" {{ old('dietary_type', $dining->dietary_type ?? '') === 'village_style' ? 'selected' : '' }}>🌾 अस्सल चुलीवरची गावरान चव (Village Wood-Fired)</option>
                <option value="jain_available" {{ old('dietary_type', $dining->dietary_type ?? '') === 'jain_available' ? 'selected' : '' }}>🥗 जैन जेवण उपलब्ध (Jain Meals Available)</option>
            </select>
        </div>
    </div>

    <!-- Row 4: Descriptions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Short Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">संक्षिप्त माहिती / वैशिष्ट्ये (मराठी)</label>
            <textarea name="short_description_mr" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="ज्वारी-बाजरीची गरमागरम चुलीवरची भाकरी, पिठलं, खर्डा/ठेचा...">{{ old('short_description_mr', $dining->short_description_mr ?? '') }}</textarea>
            @error('short_description_mr') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Short Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Short Description / Highlights (English)</label>
            <textarea name="short_description_en" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="Enjoy hot Jowar/Bajra Bhakri with authentic Pithla, Thecha, roasted Baingan Bharta...">{{ old('short_description_en', $dining->short_description_en ?? '') }}</textarea>
            @error('short_description_en') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <!-- Row 5: Image Upload + Preview -->
    <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">
            पदार्थाचा फोटो (Dish / Menu Image) 
            @if(!isset($dining->id) || !$dining->image)
                <span class="text-rose-500">*</span>
            @endif
        </label>
        
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 border border-dashed border-slate-300 rounded-2xl bg-slate-50/50">
            <!-- Preview Box -->
            <div id="image_preview_box" class="w-28 h-20 bg-slate-200 rounded-xl overflow-hidden shrink-0 flex items-center justify-center border border-slate-300 shadow-xs relative">
                @if(isset($dining->image) && $dining->image)
                    <img id="image_preview_img" src="{{ app(\App\Services\FileUploadService::class)->url($dining->image) }}" alt="Preview" class="w-full h-full object-cover">
                @else
                    <img id="image_preview_img" src="" alt="Preview" class="w-full h-full object-cover hidden">
                    <span id="image_preview_placeholder" class="text-[11px] text-slate-400 font-medium">No Image</span>
                @endif
            </div>

            <div class="flex-1 space-y-1.5">
                <input type="file" name="image" id="dining_image_input" accept="image/jpeg,image/png,image/webp,image/gif" class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 cursor-pointer">
                <p class="text-[11px] text-slate-400">JPG, PNG, WEBP किंवा GIF स्वीकारले जातात. कमाल साईझ: ३०MB (Automatically resized and optimized up to 1920px).</p>
            </div>
        </div>
        @error('image') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Row 6: Sort Order & Status -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2 border-t border-slate-100">
        <!-- Sort Order -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">क्रमवारी (Display Order / Sort Order)</label>
            <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $dining->sort_order ?? 0) }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none" placeholder="0">
            <p class="text-[11px] text-slate-400 mt-1">लहान क्रमांक आधी दिसेल (उदा. १, २, ३...). Smaller numbers display first.</p>
            @error('sort_order') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">स्थिती (Status)</label>
            <select name="status" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-amber-500 outline-none bg-white">
                <option value="active" {{ old('status', $dining->status ?? 'active') === 'active' ? 'selected' : '' }}>सक्रिय (Active - संकेतस्थळावर दाखवा)</option>
                <option value="inactive" {{ old('status', $dining->status ?? '') === 'inactive' ? 'selected' : '' }}>अक्रिय (Inactive - लपवा)</option>
            </select>
        </div>
    </div>
</div>

<script>
    document.getElementById('dining_image_input')?.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('image_preview_img');
                const placeholder = document.getElementById('image_preview_placeholder');
                if (img) {
                    img.src = e.target.result;
                    img.classList.remove('hidden');
                }
                if (placeholder) {
                    placeholder.classList.add('hidden');
                }
            }
            reader.readAsDataURL(file);
        }
    });
</script>
