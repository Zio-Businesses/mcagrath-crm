<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TwilioConversationController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        // Replace with your conversation SID
        $conversationSid = env('TWILIO_CHAT_SID'); // Update this with the correct Conversation SID

        // Send the message using the Twilio API
        $this->twilioService->sendMessage($conversationSid, $user->name, $request->message);

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
