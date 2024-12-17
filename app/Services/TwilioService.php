<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;
    protected $serviceSid;

    public function __construct()
    {
        $this->twilio = new Client(
            env('TWILIO_ACCOUNT_SID'),
            env('TWILIO_AUTH_TOKEN')
        );
        $this->serviceSid = env('TWILIO_SERVICE_SID');
    }

    public function getConversations()
    {
        return $this->twilio->conversations->v1->services($this->serviceSid)
            ->conversations
            ->read();
    }
    public function createConversation($friendlyName)
    {
        return $this->twilio->conversations->v1->services($this->serviceSid)
            ->conversations
            ->create([
                'friendlyName' => $friendlyName
            ]);
    }

    public function deleteConversation($conversationSid)
    {
        return $this->twilio->conversations->v1->services($this->serviceSid)
            ->conversations($conversationSid)
            ->delete();
    }

    public function addParticipant($conversationSid, $identity)
    {
        return $this->twilio->conversations->v1->services($this->serviceSid)
            ->conversations($conversationSid)
            ->participants
            ->create([
                'identity' => $identity,
            ]);
    }
    public function checkAndAddParticipant($conversationSid, $identity)
    {
        // Check if the participant already exists
        $participants = $this->twilio->conversations->v1->services($this->serviceSid)
            ->conversations($conversationSid)
            ->participants
            ->read();

        foreach ($participants as $participant) {
            if ($participant->identity === $identity) {
                // User is already a participant
                return;
            }
        }

        // Add the user as a participant
        $this->addParticipant($conversationSid, $identity);
    }
    public function sendMessage($conversationSid, $identity, $message)
    {
        $this->twilio->conversations->v1->services($this->serviceSid)
            ->conversations($conversationSid)
            ->messages
            ->create([
                'author' => $identity,
                'body' => $message,
            ]);
    }
    public function getMessages($conversationSid)
    {
        $messages = $this->twilio->conversations->v1->services($this->serviceSid)
            ->conversations($conversationSid)
            ->messages
            ->read();

        // Map the messages to return only the fields you need
        return array_map(function ($message) {
            return [
                'author' => $message->author, // Author of the message
                'body' => $message->body,     // Body of the message
                'dateCreated' => $message->dateCreated->format('Y-m-d H:i:s'), // Optional: format the date
            ];
        }, $messages);
    }
}
