<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwilioController extends AccountBaseController
{
    //
    public function __construct()
    {
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
        return view('twilio-sms.index', $this->data);
    }

}