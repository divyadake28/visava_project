@extends('admin.layouts.app')

@section('breadcrumb', 'Testimonials / Create')
@section('header', 'Add Guest Testimonial')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
    <div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-lg font-bold text-slate-900">Add Testimonial</h2>
            <p class="text-xs text-slate-500">Record customer feedback in Marathi & English</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">&larr; Back to Testimonials</a>
    </div>

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @include('admin.testimonials._form')
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 border border-slate-300 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-50">Cancel</a>
            <button type="submit" class="px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold rounded-xl shadow-sm transition">Save Testimonial</button>
        </div>
    </form>
</div>
@endsection
