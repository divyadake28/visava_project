@extends('admin.layouts.app')

@section('breadcrumb', 'Settings & CMS')
@section('header', 'Website & Homepage CMS Management')

@section('content')
<div class="saas-card overflow-hidden" x-data="{ activeTab: 'general' }">
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
        <div>
            <h2 class="text-base font-bold text-slate-900 font-heading">Website Configuration & Multilingual CMS</h2>
            <p class="text-xs text-slate-500">Manage site info, social links, SEO, and Homepage sections in Marathi and English</p>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="flex items-center gap-1 px-6 border-b border-slate-100 overflow-x-auto bg-slate-50/50">
        <button @click="activeTab = 'general'" :class="activeTab === 'general' ? 'border-blue-600 text-blue-600 font-bold' : 'border-transparent text-slate-500 hover:text-slate-700'" class="px-4 py-3 text-xs border-b-2 whitespace-nowrap transition">General & Contact</button>
        <button @click="activeTab = 'social'" :class="activeTab === 'social' ? 'border-blue-600 text-blue-600 font-bold' : 'border-transparent text-slate-500 hover:text-slate-700'" class="px-4 py-3 text-xs border-b-2 whitespace-nowrap transition">Social Links</button>
        <button @click="activeTab = 'seo'" :class="activeTab === 'seo' ? 'border-blue-600 text-blue-600 font-bold' : 'border-transparent text-slate-500 hover:text-slate-700'" class="px-4 py-3 text-xs border-b-2 whitespace-nowrap transition">SEO (मराठी & English)</button>
        <button @click="activeTab = 'hero'" :class="activeTab === 'hero' ? 'border-blue-600 text-blue-600 font-bold' : 'border-transparent text-slate-500 hover:text-slate-700'" class="px-4 py-3 text-xs border-b-2 whitespace-nowrap transition">Hero Section</button>
        <button @click="activeTab = 'about'" :class="activeTab === 'about' ? 'border-blue-600 text-blue-600 font-bold' : 'border-transparent text-slate-500 hover:text-slate-700'" class="px-4 py-3 text-xs border-b-2 whitespace-nowrap transition">About Section</button>
        <button @click="activeTab = 'why'" :class="activeTab === 'why' ? 'border-blue-600 text-blue-600 font-bold' : 'border-transparent text-slate-500 hover:text-slate-700'" class="px-4 py-3 text-xs border-b-2 whitespace-nowrap transition">Why Choose Us</button>
        <button @click="activeTab = 'contact_cms'" :class="activeTab === 'contact_cms' ? 'border-blue-600 text-blue-600 font-bold' : 'border-transparent text-slate-500 hover:text-slate-700'" class="px-4 py-3 text-xs border-b-2 whitespace-nowrap transition">Contact Section</button>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
        @csrf

        <!-- Tab 1: General & Contact -->
        <div x-show="activeTab === 'general'" class="space-y-6">
            <h3 class="text-sm font-bold text-slate-900 border-b pb-2">General Information & Contact</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">वेबसाईटचे नाव (मराठी)</label>
                    <input type="text" name="site_name_mr" value="{{ old('site_name_mr', $settings['site_name_mr'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Website Name (English)</label>
                    <input type="text" name="site_name_en" value="{{ old('site_name_en', $settings['site_name_en'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Official Email</label>
                    <input type="email" name="site_email" value="{{ old('site_email', $settings['site_email'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Contact Phone</label>
                    <input type="text" name="site_phone" value="{{ old('site_phone', $settings['site_phone'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">पत्ता (मराठी)</label>
                    <textarea name="address_mr" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('address_mr', $settings['address_mr'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Address (English)</label>
                    <textarea name="address_en" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('address_en', $settings['address_en'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Logo Image</label>
                    <input type="file" name="logo" accept="image/*" class="w-full text-xs">
                    @if (!empty($settings['logo']))
                        <div class="mt-2"><img src="{{ app(\App\Services\FileUploadService::class)->url($settings['logo']) }}" class="h-10 border rounded p-1"></div>
                    @endif
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Favicon</label>
                    <input type="file" name="favicon" accept="image/*" class="w-full text-xs">
                    @if (!empty($settings['favicon']))
                        <div class="mt-2"><img src="{{ app(\App\Services\FileUploadService::class)->url($settings['favicon']) }}" class="h-8 border rounded p-1"></div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tab 2: Social Links -->
        <div x-show="activeTab === 'social'" class="space-y-6" style="display: none;">
            <h3 class="text-sm font-bold text-slate-900 border-b pb-2">Social Media Channels</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Facebook URL</label>
                    <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none" placeholder="https://facebook.com/...">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Instagram URL</label>
                    <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none" placeholder="https://www.instagram.com/visawaagrotourism">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">YouTube URL</label>
                    <input type="url" name="youtube_url" value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none" placeholder="https://youtube.com/...">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none" placeholder="https://linkedin.com/...">
                </div>
            </div>
        </div>

        <!-- Tab 3: SEO -->
        <div x-show="activeTab === 'seo'" class="space-y-6" style="display: none;">
            <h3 class="text-sm font-bold text-slate-900 border-b pb-2">Multilingual Search Engine Optimization (SEO)</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4 p-4 bg-slate-50 rounded-xl">
                    <span class="text-xs font-bold text-blue-700 uppercase">मराठी SEO</span>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Meta Title (मराठी)</label>
                        <input type="text" name="meta_title_mr" value="{{ old('meta_title_mr', $settings['meta_title_mr'] ?? '') }}" class="w-full px-3.5 py-2 text-xs rounded-lg border border-slate-300 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Meta Description (मराठी)</label>
                        <textarea name="meta_description_mr" rows="3" class="w-full px-3.5 py-2 text-xs rounded-lg border border-slate-300 outline-none">{{ old('meta_description_mr', $settings['meta_description_mr'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Meta Keywords (मराठी)</label>
                        <input type="text" name="meta_keywords_mr" value="{{ old('meta_keywords_mr', $settings['meta_keywords_mr'] ?? '') }}" class="w-full px-3.5 py-2 text-xs rounded-lg border border-slate-300 outline-none">
                    </div>
                </div>

                <div class="space-y-4 p-4 bg-slate-50 rounded-xl">
                    <span class="text-xs font-bold text-slate-700 uppercase">English SEO</span>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Meta Title (English)</label>
                        <input type="text" name="meta_title_en" value="{{ old('meta_title_en', $settings['meta_title_en'] ?? '') }}" class="w-full px-3.5 py-2 text-xs rounded-lg border border-slate-300 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Meta Description (English)</label>
                        <textarea name="meta_description_en" rows="3" class="w-full px-3.5 py-2 text-xs rounded-lg border border-slate-300 outline-none">{{ old('meta_description_en', $settings['meta_description_en'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Meta Keywords (English)</label>
                        <input type="text" name="meta_keywords_en" value="{{ old('meta_keywords_en', $settings['meta_keywords_en'] ?? '') }}" class="w-full px-3.5 py-2 text-xs rounded-lg border border-slate-300 outline-none">
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab 4: Hero Section -->
        <div x-show="activeTab === 'hero'" class="space-y-6" style="display: none;">
            <h3 class="text-sm font-bold text-slate-900 border-b pb-2">Hero Banner Section</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Hero Title (मराठी)</label>
                    <input type="text" name="hero_title_mr" value="{{ old('hero_title_mr', $settings['hero_title_mr'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Hero Title (English)</label>
                    <input type="text" name="hero_title_en" value="{{ old('hero_title_en', $settings['hero_title_en'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Hero Subtitle (मराठी)</label>
                    <textarea name="hero_subtitle_mr" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('hero_subtitle_mr', $settings['hero_subtitle_mr'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Hero Subtitle (English)</label>
                    <textarea name="hero_subtitle_en" rows="3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('hero_subtitle_en', $settings['hero_subtitle_en'] ?? '') }}</textarea>
                </div>
                <div class="col-span-full">
                    <label class="block text-xs font-bold text-slate-700 mb-1">Hero Banner Image</label>
                    <input type="file" name="hero_image" accept="image/*" class="w-full text-xs">
                    @if (!empty($settings['hero_image']))
                        <div class="mt-2"><img src="{{ app(\App\Services\FileUploadService::class)->url($settings['hero_image']) }}" class="h-20 rounded border object-cover"></div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tab 5: About Section -->
        <div x-show="activeTab === 'about'" class="space-y-6" style="display: none;">
            <h3 class="text-sm font-bold text-slate-900 border-b pb-2">About Section</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">About Title (मराठी)</label>
                    <input type="text" name="about_title_mr" value="{{ old('about_title_mr', $settings['about_title_mr'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">About Title (English)</label>
                    <input type="text" name="about_title_en" value="{{ old('about_title_en', $settings['about_title_en'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">About Description (मराठी)</label>
                    <textarea name="about_description_mr" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('about_description_mr', $settings['about_description_mr'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">About Description (English)</label>
                    <textarea name="about_description_en" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('about_description_en', $settings['about_description_en'] ?? '') }}</textarea>
                </div>
                <div class="col-span-full">
                    <label class="block text-xs font-bold text-slate-700 mb-1">About Section Image</label>
                    <input type="file" name="about_image" accept="image/*" class="w-full text-xs">
                    @if (!empty($settings['about_image']))
                        <div class="mt-2"><img src="{{ app(\App\Services\FileUploadService::class)->url($settings['about_image']) }}" class="h-20 rounded border object-cover"></div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tab 6: Why Choose Us -->
        <div x-show="activeTab === 'why'" class="space-y-6" style="display: none;">
            <h3 class="text-sm font-bold text-slate-900 border-b pb-2">Why Choose Us Section</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Why Choose Us Title (मराठी)</label>
                    <input type="text" name="why_title_mr" value="{{ old('why_title_mr', $settings['why_title_mr'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Why Choose Us Title (English)</label>
                    <input type="text" name="why_title_en" value="{{ old('why_title_en', $settings['why_title_en'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Description (मराठी)</label>
                    <textarea name="why_description_mr" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('why_description_mr', $settings['why_description_mr'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Description (English)</label>
                    <textarea name="why_description_en" rows="5" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('why_description_en', $settings['why_description_en'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Tab 7: Contact CMS -->
        <div x-show="activeTab === 'contact_cms'" class="space-y-6" style="display: none;">
            <h3 class="text-sm font-bold text-slate-900 border-b pb-2">Homepage Contact Section Header</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Contact Title (मराठी)</label>
                    <input type="text" name="contact_title_mr" value="{{ old('contact_title_mr', $settings['contact_title_mr'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Contact Title (English)</label>
                    <input type="text" name="contact_title_en" value="{{ old('contact_title_en', $settings['contact_title_en'] ?? '') }}" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Contact Subtitle / Description (मराठी)</label>
                    <textarea name="contact_description_mr" rows="4" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('contact_description_mr', $settings['contact_description_mr'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Contact Subtitle / Description (English)</label>
                    <textarea name="contact_description_en" rows="4" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 outline-none">{{ old('contact_description_en', $settings['contact_description_en'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-end">
            <button type="submit" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl shadow transition">Save Website & CMS Settings</button>
        </div>
    </form>
</div>
@endsection