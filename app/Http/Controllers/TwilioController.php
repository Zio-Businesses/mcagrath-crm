<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use App\Models\VendorContract;
use Illuminate\Http\Request;
use App\Models\VendorInChat;

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
     * Insert a new vendor into the vendor_in_chat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TwilioService $twilioService, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'vendor_name' => 'required|string|max:255',
                'company_logo' => 'nullable|string|max:255',
                'vendor_country_code' => 'required|string|max:5',
                'vendor_phone' => 'required|string|unique:vendor_in_chats,vendor_phone|max:15',
            ]);

            $conversation = $twilioService->createConversation($request->vendor_name);
            $validatedData['channel_sid'] = $conversation->sid;
            $this->twilioService->checkAndAddParticipant($conversation->sid, user()->email);

            $vendor = VendorInChat::create($validatedData);

            return response()->json([
                'message' => 'Vendor created successfully',
                'data' => $vendor,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Failed to Create either the number already exist or try refreshing the page',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $vendor = VendorInChat::find($id);

        if (!$vendor) {
            return response()->json(['message' => 'Vendor not found'], 404);
        }

        $validatedData = $request->validate([
            'vendor_name' => 'sometimes|string|max:255',
            'company_logo' => 'nullable|string|max:255',
            'channel_sid' => 'sometimes|string|max:255',
            'vendor_country_code' => 'sometimes|string|max:5',
            'last_msg' => 'nullable|string',
            'vendor_phone' => 'sometimes|string|unique:vendor_in_chats,vendor_phone,' . $id . '|max:15',
        ]);

        $vendor->update($validatedData);

        return response()->json([
            'message' => 'Vendor updated successfully',
            'data' => $vendor,
        ]);
    }

    public function show($id)
    {
        $vendor = VendorInChat::find($id);

        if (!$vendor) {
            return response()->json(['message' => 'Vendor not found'], 404);
        }

        return response()->json($vendor);
    }

    public function getVendorById(Request $request)
    {
        $validatedData = $request->validate([
            'vendor_id' => 'required|integer|exists:vendor_contracts,id',
        ]);

        $vendor = VendorContract::find($validatedData['vendor_id']);

        return response()->json([
            'vendor_name' => $vendor->vendor_name,
            'vendor_cell' => $vendor->cell,
            'image_url' => $vendor->company_logo,
        ]);
    }
    public function getVendorInChat()
    {

        $vendor = VendorInChat::orderBy('updated_at', 'desc')->get();

        return response()->json($vendor);
    }

    /**
     * XXXXXXXXXXX
     *
     * @return \Illuminate\Http\Response
     */

    public function fetchVendors()
    {
        $vendors_in_chat = VendorContract::whereNotNull('chat_sid')->orderBy('sms_updated_at', 'desc')->get();
        return response()->json($vendors_in_chat);
    }

    public function index()
    {
        $vendors = VendorContract::all();
        // $vendors = VendorContract::orderBy('sms_updated_at', 'desc')->get();
        $vendors_in_chat = VendorInChat::orderBy('updated_at', 'desc')->get();

        return view('twilio-sms.index', $this->data, [
            'vendors' => $vendors,
            'vendors_in_chat' => $vendors_in_chat,
        ]);
    }
}
