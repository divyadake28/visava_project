<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Event;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{
    protected FileUploadService $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(): View
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        $event = new Event();
        return view('admin.events.create', compact('event'));
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileService->upload($request->file('image'), 'events');
            $data['banner_image'] = $data['image'];
        }

        $data['title'] = $data['title_en'] ?? $data['title_mr'] ?? null;
        $data['description'] = $data['description_en'] ?? $data['description_mr'] ?? null;
        $data['location'] = $data['location_en'] ?? $data['location_mr'] ?? null;
        $data['start_date'] = $data['event_date'] ?? null;
        $data['is_active'] = (($data['status'] ?? 'active') === 'active');

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event): View
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event): View
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileService->upload($request->file('image'), 'events', $event->image ?? $event->banner_image);
            $data['banner_image'] = $data['image'];
        }

        $data['title'] = $data['title_en'] ?? $data['title_mr'] ?? $event->title;
        $data['description'] = $data['description_en'] ?? $data['description_mr'] ?? $event->description;
        $data['location'] = $data['location_en'] ?? $data['location_mr'] ?? $event->location;
        $data['start_date'] = $data['event_date'] ?? $event->start_date;
        $data['is_active'] = (($data['status'] ?? 'active') === 'active');

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        if ($event->image) {
            $this->fileService->delete($event->image);
        }
        if ($event->banner_image && $event->banner_image !== $event->image) {
            $this->fileService->delete($event->banner_image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
