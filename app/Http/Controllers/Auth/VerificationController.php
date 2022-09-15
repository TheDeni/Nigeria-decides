<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class VerificationController extends Controller
{
    public function sendOtp()
    {
        $phone = Auth::user()->phone;

        $send_otp = Http::post(env('TERMII_URL') . '/sms/otp/send', [
            'api_key' => env('TERMII_KEY'),
            "message_type" => "NUMERIC",
            "to" => $phone,
            "from" => "N-Alert",
            "channel" => "dnd",
            "pin_attempts" => 4,
            "pin_time_to_live" =>  10,
            "pin_length" => 6,
            "pin_placeholder" => "< 1234 >",
            "message_text" => "Your verification pin is < 1234 > This pin will be invalid after 20 minutes",
            "pin_type" => "NUMERIC"
        ]);

        $res = $send_otp->json();
        if (!Arr::exists($res, 'pinId')) {
            return back()->with(['error' => 'Error while sending OTP, please try again' ]);
        }

        Auth::user()->phone_pin = $res['pinId'];
        Auth::user()->save();

        return Inertia::render('Auth/VerifyPhone');
    }

    public function verify(Request $request)
    {
        $verify_otp = Http::post(env('TERMII_URL') . '/sms/otp/verify', [
            'api_key' => env('TERMII_KEY'),
            "pin_id" => Auth::user()->phone_pin,
            "pin" => $request->otp
        ]);


        $res = $verify_otp->json();

        if (!Arr::exists($res, 'verified') || $res['verified'] != true) {
            return back()->with([ 'error' => 'Phone verification failed, please try again' ]);
        }

        Auth::user()->email_verified_at = now();
        Auth::user()->save();

        return Inertia::render('Loading', [ 'url' => '/dashboard/user' ] );
    }
}
