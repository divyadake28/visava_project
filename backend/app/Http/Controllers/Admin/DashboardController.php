<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Enquiry;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        $stats = [
            'blogs_count' => Blog::count(),
            'events_count' => Event::count(),
            'packages_count' => Package::count(),
            'galleries_count' => Gallery::count(),
            'testimonials_count' => Testimonial::count(),
            'enquiries_count' => Enquiry::count(),
            'new_enquiries_count' => Enquiry::where('status', 'new')->count(),
            'settings_count' => Setting::count(),
        ];

        $recentEnquiries = Enquiry::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentEnquiries'));
    }
}
