@extends('admin.layouts.app')

@section('breadcrumb', 'Blogs')
@section('header', 'Manage Blogs')

@section('content')
<div class="saas-card overflow-hidden space-y-0">
    <!-- Header with Action -->
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
        <div>
            <h2 class="text-base font-bold text-slate-900 font-heading">Blog Articles</h2>
            <p class="text-xs text-slate-500">Create, manage and publish news and travel articles</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>New Blog Post</span>
        </a>
    </div>

    @if ($blogs->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            <p class="text-sm font-semibold text-slate-700">No blog posts created yet</p>
            <p class="text-xs text-slate-400 mt-1">Get started by creating your first resort story or promotional article.</p>
            <a href="{{ route('admin.blogs.create') }}" class="mt-4 inline-flex items-center gap-1.5 px-4 py-2 bg-slate-900 text-white text-xs font-semibold rounded-xl hover:bg-slate-800 transition">
                + Create First Post
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-left">
                <thead class="bg-slate-50 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3.5">Title</th>
                        <th class="px-6 py-3.5">Category</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5">Published Date</th>
                        <th class="px-6 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($blogs as $blog)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-900">{{ $blog->title }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $blog->category ?? 'General' }}</td>
                            <td class="px-6 py-4">
                                <span class="badge {{ $blog->is_published ? 'badge-published' : 'badge-draft' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $blog->is_published ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    {{ $blog->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs text-slate-500">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : '-' }}</td>
                            <td class="px-6 py-4 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-xs font-bold text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $blogs->links() }}
        </div>
    @endif
</div>
@endsection
