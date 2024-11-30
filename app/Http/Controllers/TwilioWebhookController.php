<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\VendorContract;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;


class TwilioWebhookController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }
    public function handleWebhook(Request $request)
    {
        Log::info('Incoming SMS request data:', $request->all());
        $from = $request->input('From'); // Sender's phone number
        $body = $request->input('Body'); // Message content

        // Normalize the phone number
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            $parsedFrom = $phoneUtil->parse($from, null);
            $normalizedFrom = $phoneUtil->format($parsedFrom, PhoneNumberFormat::E164); // Normalize to E.164 format


            $nationalNumber = $parsedFrom->getNationalNumber();
            $vendor = VendorContract::where('cell', $nationalNumber)->first();

            if (!$vendor) {
                Log::warning("Vendor not found for phone number: $from");
                return response()->json(['error' => 'Vendor not found'], 404);
            }

            $vendorSid = $vendor->chat_sid;
            $this->twilioService->sendMessage($vendorSid, $vendor->vendor_name, $body);

            return response()->json($request->all());
        } catch (\libphonenumber\NumberParseException $e) {
            Log::error("Failed to parse phone number: {$e->getMessage()}");
            return response()->json(['error' => 'Invalid phone number'], 400);
        }
    }
}
