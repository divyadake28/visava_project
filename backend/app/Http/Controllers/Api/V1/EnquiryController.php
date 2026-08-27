<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'mr');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $validated['status'] = 'new';
        $enquiry = Enquiry::create($validated);

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' 
                ? '????? ????? ???????????? ??????? ????. ???? ??? ????? ???????? ?????? ????.' 
                : 'Your enquiry has been received successfully. Our team will contact you shortly.',
            'language' => $lang,
            'data' => $enquiry,
        ], 201);
    }
}
