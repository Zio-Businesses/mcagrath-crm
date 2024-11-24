<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use App\Models\VendorContract;

class TwilioController extends AccountBaseController
{
    protected $twilioService;
    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
        parent::__construct();
        $this->pageTitle = 'app.menu.smschat';
        $this->middleware(function ($request, $next) {

            return $next($request);
        });
    }

    /**
     * XXXXXXXXXXX
     *
     * @return \Illuminate\Http\Response
     */

    public function fetchVendors(){
        $vendors = VendorContract::all();
        $vendors_in_chat = VendorContract::whereNotNull('chat_sid')->orderBy('sms_updated_at', 'desc')->get();
        return response()->json($vendors_in_chat);
    }

    public function index()
    {
        $vendors = VendorContract::orderBy('sms_updated_at', 'desc')->get();
        $vendors_in_chat = VendorContract::whereNotNull('chat_sid')->orderBy('sms_updated_at', 'desc')->get();
        return view('twilio-sms.index', $this->data, [
            'vendors' => $vendors,
            'vendors_in_chat' => $vendors_in_chat,
        ]);
    }
}
