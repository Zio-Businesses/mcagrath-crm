<?php

namespace App\Http\Controllers;

use App\Models\VendorContract;
use App\Services\TwilioService;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;


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

        $vendor = VendorContract::where('id', $vendorId)->first();
        $vendor->sms_updated_at = now();
        $vendor->save();
        // if ($request->vendorId) {

        //     $vendor = VendorContract::where('id', $request->vendorId)->select('vendor_name', 'cell')->first();
        //     $toNumber = $vendor->cell;
        //     $twilioNumber = env('TWILIO_NUMBER');
        //     $client->messages->create(
        //         $toNumber,
        //         [
        //             'from' => $twilioNumber,
        //             'body' => $request->message
        //         ]
        //     );
        //     $message = $message;
        // }

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
