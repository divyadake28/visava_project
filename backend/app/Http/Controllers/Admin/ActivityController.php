<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActivityRequest;
use App\Models\Activity;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    protected FileUploadService $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(Request $request): View
    {
        $query = Activity::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title_mr', 'like', "%{$search}%")
                  ->orWhere('title_en', 'like', "%{$search}%")
                  ->orWhere('short_description_mr', 'like', "%{$search}%")
                  ->orWhere('short_description_en', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status === 'active') {
                $query->where('is_active', true);
            } elseif ($status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $activities = $query->orderBy('sort_order', 'asc')->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('admin.activities.index', compact('activities'));
    }

    public function create(): View
    {
        $activity = new Activity([
            'sort_order' => 0,
            'is_active' => true,
        ]);

        return view('admin.activities.create', compact('activity'));
    }

    public function store(ActivityRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileService->upload($request->file('image'), 'activities');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        Activity::create($data);

        return redirect()->route('admin.activities.index')->with('success', 'Activity / Experience created successfully.');
    }

    public function show(Activity $activity): View
    {
        return view('admin.activities.show', compact('activity'));
    }

    public function edit(Activity $activity): View
    {
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(ActivityRequest $request, Activity $activity): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileService->upload($request->file('image'), 'activities', $activity->image);
        }

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        $activity->update($data);

        return redirect()->route('admin.activities.index')->with('success', 'Activity / Experience updated successfully.');
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        if ($activity->image) {
            $this->fileService->delete($activity->image);
        }

        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'Activity / Experience deleted successfully.');
    }
}