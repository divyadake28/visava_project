@extends('admin.layouts.app')

@section('breadcrumb', 'Experiences & Activities / Create')
@section('header', 'Add Experience / Activity (नवीन उपक्रम जोडा)')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
    <div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-lg font-bold text-slate-900">Add New Activity or Experience</h2>
            <p class="text-xs text-slate-500">Configure attraction details in Marathi & English</p>
        </div>
        <a href="{{ route('admin.activities.index') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">&larr; Back to Activities</a>
    </div>

    <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @include('admin.activities._form')
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.activities.index') }}" class="px-4 py-2 border border-slate-300 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-50">Cancel</a>
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-sm transition">Save Activity</button>
        </div>
    </form>
</div>
@endsection