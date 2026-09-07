<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

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

        // Fetch Owner WhatsApp Number from config / env
        $rawOwnerNumber = config('services.whatsapp.owner_number') ?? env('WHATSAPP_OWNER_NUMBER', '919158141414');
        $cleanOwnerNumber = preg_replace('/[^0-9]/', '', $rawOwnerNumber);
        if (strlen($cleanOwnerNumber) === 10) {
            $cleanOwnerNumber = '91' . $cleanOwnerNumber;
        }

        // Build localized WhatsApp message
        $customerName = trim($enquiry->name) ?: '-';
        $customerPhone = trim($enquiry->phone) ?: '-';
        $customerEmail = trim($enquiry->email) ?: '-';
        $purpose = trim($enquiry->subject) ?: ($lang === 'mr' ? 'सामान्य चौकशी' : 'General Enquiry');
        $details = trim($enquiry->message) ?: '-';

        if ($lang === 'mr') {
            $whatsappMessage = "*विसावा कृषी पर्यटन व रिसॉर्ट*\n\n"
                . "*नवीन चौकशी*\n\n"
                . "*ग्राहकाचे नाव:* {$customerName}\n"
                . "*मोबाईल क्रमांक:* {$customerPhone}\n"
                . "*ईमेल:* {$customerEmail}\n"
                . "*भेटीचा उद्देश:* {$purpose}\n\n"
                . "*चौकशीचा तपशील:*\n"
                . "{$details}\n\n"
                . "*धन्यवाद.*";
        } else {
            $whatsappMessage = "*VISAWA AGRO TOURISM & RESORT*\n\n"
                . "*A New Enquiry Has Been Received*\n\n"
                . "*Customer Name:* {$customerName}\n"
                . "*Mobile Number:* {$customerPhone}\n"
                . "*Email Address:* {$customerEmail}\n"
                . "*Purpose of Visit:* {$purpose}\n\n"
                . "*Enquiry Details:*\n"
                . "{$details}\n\n"
                . "*Thank You.*";
        }

        $whatsappUrl = 'https://wa.me/' . $cleanOwnerNumber . '?text=' . rawurlencode($whatsappMessage);

        // Log raw message and destination
        Log::info('Enquiry WhatsApp Payload Generated', [
            'enquiry_id' => $enquiry->id,
            'language' => $lang,
            'owner_number' => $cleanOwnerNumber,
            'raw_message' => $whatsappMessage,
            'whatsapp_url' => $whatsappUrl
        ]);

        return response()->json([
            'success' => true,
            'message' => $lang === 'mr' 
                ? 'चौकशी यशस्वीरित्या पाठवली गेली आहे! धन्यवाद.' 
                : 'Your enquiry has been received successfully! Thank you.',
            'language' => $lang,
            'data' => $enquiry,
            'whatsapp' => [
                'owner_number' => $cleanOwnerNumber,
                'message' => $whatsappMessage,
                'url' => $whatsappUrl,
            ],
        ], 201, [
            'Content-Type' => 'application/json; charset=UTF-8'
        ], JSON_UNESCAPED_UNICODE);
    }
}
