<?php

namespace App\Http\Controllers;

use App\Models\VendorContract;
use App\Services\TwilioService;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;


class TwilioConversationController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function send(Client $client,Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $user = Auth::user();
        $message = $request->message;

        // Replace with your conversation SID
        $conversationSid = env('TWILIO_CHAT_SID'); // Update this with the correct Conversation SID


        if($request->vendorId){
            // Log::info("Phone number is present");
            $vendor = VendorContract::where('id', $request->vendorId)->select('vendor_name','cell')->first();
            $toNumber = '+91' . $vendor->cell;
            $twilioNumber = env('TWILIO_NUMBER');
            $client->messages->create(
                $toNumber, // Text any number
                [
                    'from' => $twilioNumber, // From a Twilio number in your account
                    'body' => $request->message
                ]
            );
            $message = '@' . $vendor->vendor_name . ' ' . $message;
        }
        // Send the message using the Twilio API
        $this->twilioService->sendMessage($conversationSid, $user->name, $message);
        return response()->json(['success' => true]);
    }
    public function index()
    {
        // Fetch messages from the Twilio conversation
        // Replace with your conversation SID
        $conversationSid = env('TWILIO_CHAT_SID'); // Update this with the correct Conversation SID

        $messages = $this->twilioService->getMessages($conversationSid);

        return response()->json($messages);
    }

}
