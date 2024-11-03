<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwilioWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Log the incoming webhook for debugging (optional)
        // \Log::info('Twilio Webhook:', $request->all());

        // Handle the incoming message
        // You can broadcast it, save to DB, or any other logic you need

        return response('Webhook received', 200);
    }
}
