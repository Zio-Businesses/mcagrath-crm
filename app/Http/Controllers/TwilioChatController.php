<?php

namespace App\Http\Controllers;

use App\Models\VendorContract;
use App\Services\TwilioService;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\VendorInChat;


class TwilioChatController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function send(Client $client, Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $user = Auth::user();
        $message = $request->message;
        $vendorId = $request->vendorId;
        $conversationSid = $request->chatsid;

        $vendor = VendorInChat::where('id', $vendorId)->first();
        $vendor->last_msg = $request->user . ": " . $message;
        $vendor->save();
        $toNumber = $vendor->vendor_country_code . "" . $vendor->vendor_phone;
        $twilioNumber = env('TWILIO_NUMBER');
        $client->messages->create(
            $toNumber,
            [
                'from' => $twilioNumber,
                'body' => $request->message
            ]
        );

        $this->twilioService->sendMessage($conversationSid, $user->name, $message);
        return response()->json(['success' => true]);
    }
    public function index(Request $request)
    {

        $conversationSid = $request->chatsid;

        $messages = $this->twilioService->getMessages($conversationSid);

        return response()->json($messages);
    }
}
