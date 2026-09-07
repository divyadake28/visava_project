<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageRequest;
use App\Models\Package;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PackageController extends Controller
{
    protected FileUploadService $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(): View
    {
        $packages = Package::latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function create(): View
    {
        $package = new Package();
        return view('admin.packages.create', compact('package'));
    }

    public function store(PackageRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->fileService->upload($request->file('featured_image'), 'packages');
        }

        $data['name'] = $data['title_en'] ?? $data['title_mr'] ?? null;
        $data['description'] = $data['description_en'] ?? $data['description_mr'] ?? null;
        $data['summary'] = $data['short_description_en'] ?? $data['short_description_mr'] ?? null;
        $data['duration'] = $data['duration_en'] ?? $data['duration_mr'] ?? null;
        $data['price'] = 0;
        $data['discounted_price'] = null;
        $data['is_active'] = (($data['status'] ?? 'active') === 'active');

        Package::create($data);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function show(Package $package): View
    {
        return view('admin.packages.show', compact('package'));
    }

    public function edit(Package $package): View
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(PackageRequest $request, Package $package): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->fileService->upload($request->file('featured_image'), 'packages', $package->featured_image);
        }

        $data['name'] = $data['title_en'] ?? $data['title_mr'] ?? $package->name;
        $data['description'] = $data['description_en'] ?? $data['description_mr'] ?? $package->description;
        $data['summary'] = $data['short_description_en'] ?? $data['short_description_mr'] ?? $package->summary;
        $data['duration'] = $data['duration_en'] ?? $data['duration_mr'] ?? $package->duration;
        $data['is_active'] = (($data['status'] ?? 'active') === 'active');

        $package->update($data);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package): RedirectResponse
    {
        if ($package->featured_image) {
            $this->fileService->delete($package->featured_image);
        }

        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }
}
