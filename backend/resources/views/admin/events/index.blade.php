@extends('admin.layouts.app')

@section('breadcrumb', 'Events')
@section('header', 'Manage Events')

@section('content')
<div class="saas-card overflow-hidden space-y-0">
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
        <div>
            <h2 class="text-base font-bold text-slate-900 font-heading">Resort Events</h2>
            <p class="text-xs text-slate-500">Manage schedules, performances, festivals and guest activities</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>New Event</span>
        </a>
    </div>

    @if ($events->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <p class="text-sm font-semibold text-slate-700">No events scheduled</p>
            <p class="text-xs text-slate-400 mt-1">Schedule cultural nights, weekend parties and seasonal events.</p>
            <a href="{{ route('admin.events.create') }}" class="mt-4 inline-flex items-center gap-1.5 px-4 py-2 bg-slate-900 text-white text-xs font-semibold rounded-lg hover:bg-slate-800 transition">
                + Add First Event
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-left">
                <thead class="bg-slate-50 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3.5">Event Title</th>
                        <th class="px-6 py-3.5">Location</th>
                        <th class="px-6 py-3.5">Start Date</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($events as $event)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-900">{{ $event->title }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $event->location ?? 'Resort Premises' }}</td>
                            <td class="px-6 py-4 text-xs text-slate-600 font-medium">{{ $event->start_date->format('M d, Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <span class="badge {{ $event->is_active ? 'badge-active' : 'badge-inactive' }}">
                                    {{ $event->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.events.edit', $event) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
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
            {{ $events->links() }}
        </div>
    @endif
</div>
@endsection
