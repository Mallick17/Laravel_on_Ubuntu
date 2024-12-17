<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsappController extends Controller
{
public function sendContactDetails(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
    ]);

    $name = $request->input('name');
    $email = $request->input('email');
    $phone = $request->input('phone');

    $recipients = [
        '+919629777826',
        '+918667854815',
        '+917293551778',
        '+918072212718',
        '+918667336710'
    ];

    $message = "New Contact Form Submission:\n"
        . "Name: $name\n"
        . "Email: $email\n"
        . "Phone: $phone";

    $sid = env('TWILIO_SID');
    $authToken = env('TWILIO_AUTH_TOKEN');
    $twilioWhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');

    $twilio = new Client($sid, $authToken);

    foreach ($recipients as $recipient) {
        try {
            $twilio->messages->create(
                "whatsapp:$recipient",
                [
                    'from' => $twilioWhatsAppNumber,
                    'body' => $message,
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    return response()->json(['success' => 'Message sent successfully.']);
}
}
