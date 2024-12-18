<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use GeoIP;

class WhatsappController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->ip());
        $location = geoip()->getLocation($request->ip());
        dd($location);
        return view('whatsapp');
    }

    function store(Request $request)
    {
        //Note : Both the form and to numbers should be defined like whatsapp:CountryCode+PhoneNumber
        //For example
        //whatsapp:+1234567
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioWhatsappNumber = 'whatsapp:' . env('TWILIO_WHATSAPP_NUMBER');
        $to = 'whatsapp:' . $request->phone;
        $message = $request->message;
        // dd($to);

        $client = new Client($twilioSid, $twilioAuthToken);

        try {
            $message = $client->messages->create(
                $to,
                array(
                    'from' => $twilioWhatsappNumber,
                    'body' => $message
                )
            );
            return "Message sent successfully! SID: " . $message->sid;
        } catch (Exception $e) {
            return "Error sending message: " . $e->getMessage();
        }
    }
}
