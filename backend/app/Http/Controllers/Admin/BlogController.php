<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    protected FileUploadService $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(): View
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create(): View
    {
        $blog = new Blog();
        return view('admin.blogs.create', compact('blog'));
    }

    public function store(BlogRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->fileService->upload($request->file('featured_image'), 'blogs');
        }

        $data['title'] = $data['title_en'] ?? $data['title_mr'] ?? null;
        $data['content'] = $data['description_en'] ?? $data['description_mr'] ?? null;
        $data['excerpt'] = $data['short_description_en'] ?? $data['short_description_mr'] ?? null;
        $data['is_published'] = (($data['status'] ?? 'active') === 'active');

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function show(Blog $blog): View
    {
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog): View
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->fileService->upload($request->file('featured_image'), 'blogs', $blog->featured_image);
        }

        $data['title'] = $data['title_en'] ?? $data['title_mr'] ?? $blog->title;
        $data['content'] = $data['description_en'] ?? $data['description_mr'] ?? $blog->content;
        $data['excerpt'] = $data['short_description_en'] ?? $data['short_description_mr'] ?? $blog->excerpt;
        $data['is_published'] = (($data['status'] ?? 'active') === 'active');

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        if ($blog->featured_image) {
            $this->fileService->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
