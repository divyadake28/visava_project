<!-- Bilingual Form Notice -->
<div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200/80 rounded-2xl text-xs text-blue-900 flex items-start gap-3 shadow-xs">
    <div class="w-7 h-7 rounded-lg bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-xs">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
    </div>
    <div>
        <span class="font-bold text-blue-950">सूचना (Note):</span> किमान एका भाषेत माहिती भरणे आवश्यक आहे. तुम्ही मराठी, इंग्रजी किंवा दोन्ही भाषांमध्ये माहिती भरू शकता.
        <span class="block text-[11px] text-blue-700 font-medium mt-0.5">Please fill at least one language. You may enter content in Marathi, English, or both.</span>
    </div>
</div>

<div class="space-y-6">
    <!-- Section 1: Titles -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Title Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                <span>ब्लॉग शीर्षक (मराठी)</span>
            </label>
            <input type="text" name="title_mr" value="{{ old('title_mr', $blog->title_mr ?? '') }}" class="w-full px-4 py-2.5 text-sm rounded-xl border {{ $errors->has('title_mr') ? 'border-rose-500 ring-1 ring-rose-500 bg-rose-50/20' : 'border-slate-300' }} focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition outline-none" placeholder="उदा. विसावा रिसॉर्टमधील मुख्य आकर्षणे">
            @error('title_mr') <p class="text-rose-600 text-xs font-medium mt-1.5">{{ $message }}</p> @enderror
        </div>

        <!-- Title English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                <span>Blog Title (English)</span>
            </label>
            <input type="text" name="title_en" value="{{ old('title_en', $blog->title_en ?? '') }}" class="w-full px-4 py-2.5 text-sm rounded-xl border {{ $errors->has('title_en') ? 'border-rose-500 ring-1 ring-rose-500 bg-rose-50/20' : 'border-slate-300' }} focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition outline-none" placeholder="e.g. Top Attractions at Visava Resort">
            @error('title_en') <p class="text-rose-600 text-xs font-medium mt-1.5">{{ $message }}</p> @enderror
        </div>
    </div>

    <!-- Section 2: Short Descriptions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Short Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1.5">संक्षिप्त माहिती (मराठी - पर्यायी)</label>
            <textarea name="short_description_mr" rows="3" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition outline-none" placeholder="संक्षिप्त सारांश...">{{ old('short_description_mr', $blog->short_description_mr ?? '') }}</textarea>
        </div>

        <!-- Short Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1.5">Short Description (English - Optional)</label>
            <textarea name="short_description_en" rows="3" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition outline-none" placeholder="Brief summary...">{{ old('short_description_en', $blog->short_description_en ?? '') }}</textarea>
        </div>
    </div>

    <!-- Section 3: Full Articles -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Full Description Marathi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                <span>संपूर्ण ब्लॉग मजकूर (मराठी)</span>
            </label>
            <textarea name="description_mr" rows="7" class="w-full px-4 py-2.5 text-sm rounded-xl border {{ $errors->has('description_mr') ? 'border-rose-500 ring-1 ring-rose-500 bg-rose-50/20' : 'border-slate-300' }} focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition outline-none leading-relaxed" placeholder="सविस्तर ब्लॉग लेख...">{{ old('description_mr', $blog->description_mr ?? '') }}</textarea>
            @error('description_mr') <p class="text-rose-600 text-xs font-medium mt-1.5">{{ $message }}</p> @enderror
        </div>

        <!-- Full Description English -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                <span>Full Blog Content (English)</span>
            </label>
            <textarea name="description_en" rows="7" class="w-full px-4 py-2.5 text-sm rounded-xl border {{ $errors->has('description_en') ? 'border-rose-500 ring-1 ring-rose-500 bg-rose-50/20' : 'border-slate-300' }} focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition outline-none leading-relaxed" placeholder="Detailed blog article...">{{ old('description_en', $blog->description_en ?? '') }}</textarea>
            @error('description_en') <p class="text-rose-600 text-xs font-medium mt-1.5">{{ $message }}</p> @enderror
        </div>
    </div>

    <!-- Section 4: Media & Social Integrations Box -->
    <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl space-y-6 shadow-2xs">
        <div class="border-b border-slate-200 pb-3">
            <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                <span>ब्लॉग मीडिया व सोशल लिंक्स (Media & Social Integrations)</span>
            </h3>
            <p class="text-xs text-slate-500 mt-0.5">बॅनर इमेज, व्हिडिओ, YouTube आणि Instagram लिंक्स जोडा.</p>
        </div>

        <!-- Row A: Featured Image & Video Upload -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Featured Image -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                    <span>Featured Image (बॅनर इमेज)</span>
                    <span class="text-[11px] text-slate-400 font-normal">JPG, PNG, WEBP (Max 30MB)</span>
                </label>
                
                <div class="p-2.5 bg-white rounded-xl border {{ $errors->has('featured_image') ? 'border-rose-400 ring-1 ring-rose-300' : 'border-slate-300' }} shadow-2xs space-y-2.5">
                    <div class="flex items-center gap-2.5">
                        <label class="px-3.5 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 text-xs font-bold rounded-lg cursor-pointer transition shrink-0 border border-blue-200/60 shadow-2xs">
                            <span>Choose Image</span>
                            <input type="file" name="featured_image" id="featuredImageInput" accept="image/*" class="hidden">
                        </label>
                        <span id="featuredImageFileName" class="text-xs text-slate-500 truncate flex-1 font-medium">No file selected</span>
                    </div>

                    <div id="imagePreviewContainer" class="hidden pt-2 border-t border-slate-100 flex items-center gap-2.5">
                        <img id="imagePreview" src="" alt="Selected Preview" class="w-14 h-10 rounded-lg object-cover border border-slate-200 shadow-2xs shrink-0">
                        <div class="overflow-hidden">
                            <span class="text-xs font-semibold text-blue-700 block truncate">New Image Selected</span>
                            <span class="text-[10px] text-slate-400">Ready to upload</span>
                        </div>
                    </div>

                    @if (!empty($blog->featured_image))
                        <div id="currentImageBadge" class="pt-2 border-t border-slate-100 flex items-center gap-2.5">
                            <img src="{{ app(\App\Services\FileUploadService::class)->url($blog->featured_image) }}" alt="Current Banner" class="w-14 h-10 rounded-lg object-cover border border-slate-200 shadow-2xs shrink-0">
                            <div class="overflow-hidden">
                                <span class="text-xs font-semibold text-slate-700 block truncate">Current Banner Stored</span>
                                <span class="text-[10px] text-slate-400">Will be replaced if a new file is chosen</span>
                            </div>
                        </div>
                    @endif
                </div>
                @error('featured_image') <p class="text-rose-600 text-xs font-medium mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Blog Video Upload -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                    <span>Blog Video (Optional / ब्लॉग व्हिडिओ)</span>
                    <span class="text-[11px] text-slate-400 font-normal">MP4, WebM, MOV (Max 100MB)</span>
                </label>
                
                <div class="p-2.5 bg-white rounded-xl border {{ $errors->has('blog_video') ? 'border-rose-400 ring-1 ring-rose-300' : 'border-slate-300' }} shadow-2xs space-y-2.5">
                    <div class="flex items-center gap-2.5">
                        <label class="px-3.5 py-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-xs font-bold rounded-lg cursor-pointer transition shrink-0 border border-emerald-200/60 shadow-2xs">
                            <span>Choose Video</span>
                            <input type="file" name="blog_video" id="blogVideoInput" accept="video/mp4,video/webm,video/quicktime,.mp4,.webm,.mov" class="hidden">
                        </label>
                        <span id="videoFileName" class="text-xs text-slate-500 truncate flex-1 font-medium">No video selected</span>
                    </div>

                    <!-- Live Video Preview Box -->
                    <div id="videoPreviewContainer" class="hidden pt-2 border-t border-slate-100 space-y-1.5">
                        <div class="flex items-center justify-between text-[11px]">
                            <span class="font-bold text-emerald-800">New Video Preview</span>
                            <span class="text-emerald-600 font-semibold" id="videoFileSize"></span>
                        </div>
                        <video id="videoPreview" controls class="w-full max-h-36 rounded-lg bg-black object-contain shadow-xs"></video>
                    </div>

                    @if (!empty($blog->blog_video))
                        <div id="currentVideoBadge" class="pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
                            <div class="flex items-center gap-2 overflow-hidden">
                                <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center text-xs shrink-0 font-bold">🎥</span>
                                <div class="overflow-hidden">
                                    <span class="text-xs font-semibold text-slate-800 block truncate">Current Video Stored</span>
                                    <span class="text-[10px] text-slate-400">Stored in Laravel Cloud Storage</span>
                                </div>
                            </div>
                            <a href="{{ app(\App\Services\FileUploadService::class)->url($blog->blog_video) }}" target="_blank" class="px-2.5 py-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-[11px] font-bold rounded-lg transition shrink-0 border border-emerald-200">
                                Play &rarr;
                            </a>
                        </div>
                    @endif
                </div>
                @error('blog_video') <p class="text-rose-600 text-xs font-medium mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Row B: YouTube & Instagram URLs -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- YouTube Video Link -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                    <span>YouTube Video Link (Optional / युट्यूब लिंक)</span>
                    <span class="text-[11px] text-slate-400 font-normal">Embeds 16:9 on frontend</span>
                </label>
                <div class="relative flex items-center">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-red-600">
                        <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </div>
                    <input 
                        type="url" 
                        name="youtube_url" 
                        id="youtubeUrlInput" 
                        value="{{ old('youtube_url', $blog->youtube_url ?? '') }}" 
                        style="padding-left: 42px;"
                        class="w-full pr-4 py-2.5 text-sm rounded-xl border {{ $errors->has('youtube_url') ? 'border-rose-400 ring-1 ring-rose-400' : 'border-slate-300' }} bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition outline-none" 
                        placeholder="https://www.youtube.com/watch?v=... or https://youtu.be/...">
                </div>
                <p class="text-[11px] text-slate-500">Supports YouTube Watch, youtu.be, Embed & Shorts links</p>
                @error('youtube_url') <p class="text-rose-600 text-xs font-medium mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Instagram Post/Reel Link -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                    <span>Instagram Link (Optional / इन्स्टाग्राम लिंक)</span>
                    <span class="text-[11px] text-slate-400 font-normal">Reels, Posts & Profile</span>
                </label>
                <div class="relative flex items-center">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <span class="w-5 h-5 rounded-md bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] flex items-center justify-center text-white shadow-2xs shrink-0">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </span>
                    </div>
                    <input 
                        type="url" 
                        name="instagram_url" 
                        value="{{ old('instagram_url', $blog->instagram_url ?? '') }}" 
                        style="padding-left: 42px;"
                        class="w-full pr-4 py-2.5 text-sm rounded-xl border {{ $errors->has('instagram_url') ? 'border-rose-400 ring-1 ring-rose-400' : 'border-slate-300' }} bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition outline-none" 
                        placeholder="https://www.instagram.com/p/... or /reel/...">
                </div>
                <p class="text-[11px] text-slate-500">Supports Instagram Post, Reel, or Profile URLs</p>
                @error('instagram_url') <p class="text-rose-600 text-xs font-medium mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Row C: Status & Visibility -->
        <div class="pt-3 border-t border-slate-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <span>Publication Status (स्थिती) <span class="text-rose-500">*</span></span>
                    </label>
                    <select name="status" class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-300 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition outline-none font-medium text-slate-800 shadow-2xs">
                        <option value="active" {{ old('status', $blog->status ?? 'active') === 'active' ? 'selected' : '' }}>🟢 Active (सक्रिय - प्रकाशित / Published)</option>
                        <option value="inactive" {{ old('status', $blog->status ?? '') === 'inactive' ? 'selected' : '' }}>⚪ Inactive (अप्रकाशित / Draft)</option>
                    </select>
                </div>
                <div class="text-xs text-slate-500 pt-2 md:pt-4">
                    Active blogs will be immediately visible on the website frontend in Marathi and English.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Featured Image Input & Preview
        const imageInput = document.getElementById('featuredImageInput');
        const imageNameSpan = document.getElementById('featuredImageFileName');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const currentImageBadge = document.getElementById('currentImageBadge');

        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    imageNameSpan.textContent = file.name;
                    imageNameSpan.classList.remove('text-slate-500');
                    imageNameSpan.classList.add('text-slate-800', 'font-bold');
                    const url = URL.createObjectURL(file);
                    imagePreview.src = url;
                    imagePreviewContainer.classList.remove('hidden');
                    if (currentImageBadge) currentImageBadge.classList.add('opacity-40');
                } else {
                    imageNameSpan.textContent = 'No file selected';
                    imagePreviewContainer.classList.add('hidden');
                    imagePreview.src = '';
                    if (currentImageBadge) currentImageBadge.classList.remove('opacity-40');
                }
            });
        }

        // Blog Video Input & Preview
        const videoInput = document.getElementById('blogVideoInput');
        const videoNameSpan = document.getElementById('videoFileName');
        const previewContainer = document.getElementById('videoPreviewContainer');
        const videoPreview = document.getElementById('videoPreview');
        const videoFileSize = document.getElementById('videoFileSize');
        const currentVideoBadge = document.getElementById('currentVideoBadge');

        if (videoInput) {
            videoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const sizeMB = (file.size / (1024 * 1024)).toFixed(1);
                    videoNameSpan.textContent = file.name;
                    videoNameSpan.classList.remove('text-slate-500');
                    videoNameSpan.classList.add('text-slate-800', 'font-bold');
                    videoFileSize.textContent = `(${sizeMB} MB)`;
                    const fileUrl = URL.createObjectURL(file);
                    videoPreview.src = fileUrl;
                    previewContainer.classList.remove('hidden');
                    if (currentVideoBadge) currentVideoBadge.classList.add('opacity-40');
                } else {
                    videoNameSpan.textContent = 'No video selected';
                    previewContainer.classList.add('hidden');
                    videoPreview.src = '';
                    if (currentVideoBadge) currentVideoBadge.classList.remove('opacity-40');
                }
            });
        }
    });
</script>