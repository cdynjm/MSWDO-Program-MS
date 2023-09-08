<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SMSToken;
use Illuminate\Support\Facades\Auth;

class SMSController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {

        if(Auth::user()->type == 1) {
            $smstoken = SMSToken::get();
            return view('pages.sms-configuration', compact('smstoken'));
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        if(Auth::user()->type == 1) {
            SMSToken::where(['id' => 1])->update([
                'url' => $request->url,
                'access_token' => $request->access_token,
                'mobile_identity' => $request->mobile_identity
            ]);

            return response()->json(['Error' => 0, 'Message'=> 'SMS Settings Configured Successfully']); 
        }
    }
}
