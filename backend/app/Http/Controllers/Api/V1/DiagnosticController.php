<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DiagnosticController extends Controller
{
    public function emojiAudit(): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'supported_emojis' => ['🍛', '🌅', '🔥', '☕', '🍍', '👨‍👩‍👧‍👦', '🌾', '🥣'],
            'timestamp' => now()->toIso8601String(),
        ]);
    }
}
