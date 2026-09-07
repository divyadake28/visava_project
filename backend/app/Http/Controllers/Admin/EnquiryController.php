<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function index(Request $request): View
    {
        $counts = [
            'all' => Enquiry::count(),
            'new' => Enquiry::where('status', 'new')->count(),
            'contacted' => Enquiry::where('status', 'contacted')->count(),
            'closed' => Enquiry::where('status', 'closed')->count(),
        ];

        $query = Enquiry::latest();

        if ($request->filled('status') && in_array($request->status, ['new', 'contacted', 'closed'])) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $enquiries = $query->paginate(10)->withQueryString();
        return view('admin.enquiries.index', compact('enquiries', 'counts'));
    }

    public function show(Enquiry $enquiry): View
    {
        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Request $request, Enquiry $enquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,closed',
        ]);

        $enquiry->update($validated);

        return redirect()->back()->with('success', 'Enquiry status updated successfully.');
    }

    public function destroy(Enquiry $enquiry): RedirectResponse
    {
        $enquiry->delete();
        return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry removed successfully.');
    }
}
