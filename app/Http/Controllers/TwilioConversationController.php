<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\VendorContract;
use App\Models\VendorInChat;

class TwilioConversationController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function getConversation(TwilioService $twilioService)
    {
        $conversations = $twilioService->getConversations();
        $data = [];
        foreach ($conversations as $conversation) {
            $data[] = [
                'sid' => $conversation->sid,
                'friendly_name' => $conversation->friendlyName,
                'created_at' => $conversation->dateCreated->format('Y-m-d H:i:s'),
            ];
        }

        return response()->json($data);
    }

    public function createConversation(TwilioService $twilioService, Request $request)
    {

        $request->validate([
            'vendor_id' => 'required|exists:vendor_in_chats,id',
        ]);
        try {
            $vendor = VendorInChat::find($request->vendor_id);

            if (!$vendor) {
                return response()->json(['error' => 'Vendor not found'], 404);
            }

            $this->twilioService->checkAndAddParticipant($vendor->channel_sid, user()->email);
            return response()->json([
                'sid' => $vendor->channel_sid,
                'friendly_name' => $vendor->vendor_name,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to process request'], 500);
        }
    }

    public function deleteConversation($sid, TwilioService $twilioService)
    {
        $twilioService->deleteConversation($sid);
        return response()->json(['message' => 'Conversation deleted']);
    }
}
