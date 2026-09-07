@extends('admin.layouts.app')

@section('breadcrumb', 'Packages')
@section('header', 'Manage Packages')

@section('content')
<div class="saas-card overflow-hidden space-y-0">
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
        <div>
            <h2 class="text-base font-bold text-slate-900 font-heading">Stay & Tour Packages</h2>
            <p class="text-xs text-slate-500">Configure duration, inclusions, activities and featured offerings</p>
        </div>
        <a href="{{ route('admin.packages.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>New Package</span>
        </a>
    </div>

    @if ($packages->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            <p class="text-sm font-semibold text-slate-700">No packages created</p>
            <p class="text-xs text-slate-400 mt-1">Design staycation, weekend or corporate vacation packages.</p>
            <a href="{{ route('admin.packages.create') }}" class="mt-4 inline-flex items-center gap-1.5 px-4 py-2 bg-slate-900 text-white text-xs font-semibold rounded-lg hover:bg-slate-800 transition">
                + Create First Package
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-left">
                <thead class="bg-slate-50 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3.5">Package</th>
                        <th class="px-6 py-3.5">Duration</th>
                        <th class="px-6 py-3.5">Featured</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($packages as $pkg)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-900">{{ $pkg->name }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $pkg->duration ?? 'Custom' }}</td>
                            <td class="px-6 py-4">
                                <span class="badge {{ $pkg->is_featured ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-600' }}">
                                    {{ $pkg->is_featured ? 'Featured' : 'Standard' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="badge {{ $pkg->is_active ? 'badge-active' : 'badge-inactive' }}">
                                    {{ $pkg->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.packages.edit', $pkg) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="{{ route('admin.packages.destroy', $pkg) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $packages->links() }}
        </div>
    @endif
</div>
@endsection
