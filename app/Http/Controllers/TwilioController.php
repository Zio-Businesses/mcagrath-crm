<?php

namespace App\Http\Controllers;
use App\Services\TwilioService;

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
    public function index()
    {
        $this->twilioService->checkAndAddParticipant(env('TWILIO_CHAT_SID'), user()->email);
        return view('twilio-sms.index', $this->data);
    }
}
