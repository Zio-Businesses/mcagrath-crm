<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\VendorContract;

class TwilioWebhookController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }
    public function handleWebhook(Request $request)
    {
        // Log the incoming SMS details
        Log::info('Incoming SMS request data:', $request->all());
        $from = $request->input('From'); // Sender's phone number
        $body = $request->input('Body'); // Message content


        $normalizedFrom = preg_replace('/^\+\d+/', '', $from);
        $vendor = VendorContract::where('cell', 'like', "%$normalizedFrom")->first();

        if (!$vendor) {
            Log::warning("Vendor not found for phone number: $from");
            return response()->json(['error' => 'Vendor not found'], 404);
        }


        $vendorSid = $vendor->chat_sid;
        $this->twilioService->sendMessage($vendorSid, $vendor->name, $body);

        return response()->json($request->all());
    }
}
