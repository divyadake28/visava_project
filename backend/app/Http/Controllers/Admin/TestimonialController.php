<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\Testimonial;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    protected FileUploadService $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(): View
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        $testimonial = new Testimonial();
        return view('admin.testimonials.create', compact('testimonial'));
    }

    public function store(TestimonialRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('client_image')) {
            $data['client_image'] = $this->fileService->upload($request->file('client_image'), 'testimonials');
            $data['avatar'] = $data['client_image'];
        }

        $data['name'] = $data['client_name'];
        $data['designation'] = $data['client_designation_en'] ?? $data['client_designation_mr'];
        $data['comment'] = $data['review_en'] ?? $data['review_mr'];
        $data['is_approved'] = ($data['status'] === 'active');

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial): View
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('client_image')) {
            $data['client_image'] = $this->fileService->upload($request->file('client_image'), 'testimonials', $testimonial->client_image ?? $testimonial->avatar);
            $data['avatar'] = $data['client_image'];
        }

        $data['name'] = $data['client_name'];
        $data['designation'] = $data['client_designation_en'] ?? $data['client_designation_mr'];
        $data['comment'] = $data['review_en'] ?? $data['review_mr'];
        $data['is_approved'] = ($data['status'] === 'active');

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        if ($testimonial->client_image) {
            $this->fileService->delete($testimonial->client_image);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
