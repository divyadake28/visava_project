<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Gallery;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GalleryController extends Controller
{
    protected FileUploadService $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(): View
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create(): View
    {
        $gallery = new Gallery();
        return view('admin.galleries.create', compact('gallery'));
    }

    public function store(GalleryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileService->upload($request->file('image'), 'galleries');
            $data['image_path'] = $data['image'];
        }

        $data['title'] = $data['title_en'] ?? $data['title_mr'];
        $data['category'] = $data['category_en'] ?? $data['category_mr'];
        $data['is_active'] = ($data['status'] === 'active');

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery photo uploaded successfully.');
    }

    public function show(Gallery $gallery): View
    {
        return view('admin.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(GalleryRequest $request, Gallery $gallery): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileService->upload($request->file('image'), 'galleries', $gallery->image ?? $gallery->image_path);
            $data['image_path'] = $data['image'];
        }

        $data['title'] = $data['title_en'] ?? $data['title_mr'];
        $data['category'] = $data['category_en'] ?? $data['category_mr'];
        $data['is_active'] = ($data['status'] === 'active');

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery photo updated successfully.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        if ($gallery->image) {
            $this->fileService->delete($gallery->image);
        }
        if ($gallery->image_path && $gallery->image_path !== $gallery->image) {
            $this->fileService->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery photo deleted successfully.');
    }
}
