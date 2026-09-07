@extends('admin.layouts.app')

@section('breadcrumb')
    <a href="{{ route('admin.dining.index') }}" class="hover:underline">Dining & Menus</a> / नवीन मेनू
@endsection

@section('header', 'नवीन खाद्य मेनू / पदार्थ जोडा (New Dining Item)')

@section('content')
<div class="max-w-4xl">
    <div class="saas-card p-6 sm:p-8">
        <div class="mb-6 pb-4 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-slate-900 font-heading">Add New Dining Item</h2>
                <p class="text-xs text-slate-500 mt-0.5">Upload a photo, enter bilingual descriptions, and assign categories & badges.</p>
            </div>
            <a href="{{ route('admin.dining.index') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
                &larr; Back to List
            </a>
        </div>

        <form action="{{ route('admin.dining.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @include('admin.dining._form')

            <div class="mt-8 pt-5 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.dining.index') }}" class="px-4 py-2.5 text-xs font-bold text-slate-600 hover:text-slate-900 rounded-xl transition">
                    रद्द करा (Cancel)
                </a>
                <button type="submit" class="px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
                    जतन करा (Save Dining Item)
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
