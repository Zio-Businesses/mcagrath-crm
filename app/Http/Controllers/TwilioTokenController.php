<?php

namespace App\Http\Controllers;


use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;
use Illuminate\Http\Request;


class TwilioTokenController extends Controller
{
    public function generateToken(Request $request)
    {
        $sid = env('TWILIO_ACCOUNT_SID'); // Your Account SID
        $authToken = env('TWILIO_AUTH_TOKEN'); // Your Auth Token
        $apiKey = env('TWILIO_API_KEY'); // Your API Key
        $apiSecret = env('TWILIO_API_SECRET'); // Your API Secret
        $chatServiceSid = env('TWILIO_SERVICE_SID'); // Your Conversation Service SID

        // Create an access token
        $accessToken = new AccessToken($sid, $apiKey, $apiSecret, 3600, $request->user()->email);

        // Create a Chat grant
        $chatGrant = new ChatGrant();
        $chatGrant->setServiceSid($chatServiceSid);
        $accessToken->addGrant($chatGrant);

        // Return the access token as a JSON response
        return response()->json(['token' => $accessToken->toJWT()]);
    }

}
