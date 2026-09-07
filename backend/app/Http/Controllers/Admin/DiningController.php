<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiningRequest;
use App\Models\Dining;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiningController extends Controller
{
    protected FileUploadService $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(Request $request): View
    {
        $query = Dining::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title_mr', 'like', "%{$search}%")
                  ->orWhere('title_en', 'like', "%{$search}%")
                  ->orWhere('category_mr', 'like', "%{$search}%")
                  ->orWhere('category_en', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('category')) {
            $cat = $request->input('category');
            $query->where(function ($q) use ($cat) {
                $q->where('category_mr', $cat)
                  ->orWhere('category_en', $cat);
            });
        }

        $diningItems = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(12)
            ->withQueryString();

        $categories = Dining::select('category_en')
            ->whereNotNull('category_en')
            ->where('category_en', '!=', '')
            ->distinct()
            ->pluck('category_en');

        $stats = [
            'total' => Dining::count(),
            'active' => Dining::where(function($q) {
                $q->where('status', 'active')->orWhere('is_active', true);
            })->count(),
            'categories_count' => $categories->count() ?: 1,
            'featured_count' => Dining::where(function($q) {
                $q->whereNotNull('badge_mr')->where('badge_mr', '!=', '')
                  ->orWhereNotNull('badge_en')->where('badge_en', '!=', '');
            })->count(),
        ];

        return view('admin.dining.index', compact('diningItems', 'categories', 'stats'));
    }

    public function create(): View
    {
        $dining = new Dining();
        return view('admin.dining.create', compact('dining'));
    }

    public function store(DiningRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileService->upload($request->file('image'), 'dining');
        }

        $data['sort_order'] = (int) ($request->input('sort_order', 0));
        $data['is_active'] = (($data['status'] ?? 'active') === 'active');
        $data['created_by'] = auth()->id();

        Dining::create($data);

        return redirect()->route('admin.dining.index')->with('success', 'खाद्य मेनू / पदार्थ यशस्वीरित्या जोडला गेला (Dining item created successfully).');
    }

    public function show(Dining $dining): View
    {
        return view('admin.dining.show', compact('dining'));
    }

    public function edit(Dining $dining): View
    {
        return view('admin.dining.edit', compact('dining'));
    }

    public function update(DiningRequest $request, Dining $dining): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileService->upload($request->file('image'), 'dining', $dining->image);
        }

        $data['sort_order'] = (int) ($request->input('sort_order', 0));
        $data['is_active'] = (($data['status'] ?? 'active') === 'active');
        $data['updated_by'] = auth()->id();

        $dining->update($data);

        return redirect()->route('admin.dining.index')->with('success', 'खाद्य मेनू / पदार्थ यशस्वीरित्या अद्यतनित केला (Dining item updated successfully).');
    }

    public function destroy(Dining $dining): RedirectResponse
    {
        if ($dining->image) {
            $this->fileService->delete($dining->image);
        }

        $dining->delete();

        return redirect()->route('admin.dining.index')->with('success', 'खाद्य मेनू / पदार्थ यशस्वीरित्या काढून टाकला (Dining item deleted successfully).');
    }
}
