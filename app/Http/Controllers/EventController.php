<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\ProgramType;
use App\Models\Notify;
use App\Models\Event;
use App\Models\SMSToken;

class EventController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {

        $programs = Program::orderBy('program', 'ASC')->get();

        if(Auth::user()->type == 1 || Auth::user()->type == 2) {
            $event = Event::get();
        }

        if(Auth::user()->type == 3) {
            $event = Event::get();
        }

        return view('pages.schedule', compact('programs', 'event'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {
        
        $smstoken = SMSToken::get();

        if(Auth::user()->type == 1) {
            $event = Event::create([
                'title' => $request->event_title,
                'date' => $request->event_date,
                'program' => $request->program_type,
                'location' => $request->event_location,
                'time' => $request->event_time
            ]);

            $beneficiaries = ProgramType::where(['program' => $request->program_type])->where(['status' => 1])->get();

            foreach($beneficiaries as $ben) {

                foreach($smstoken as $st) {
                    $mobile_iden = $st->mobile_identity; // as you have copied from the url, explained above
                    $mobile_token = $st->access_token; // as per your creation of token
                }

                $addresses = $ben->Beneficiary->contact_number; // mobile number to send text to
                $sms = "Hi Good Day! This is MSWDO Bontoc \n\nWhat: ".$request->event_title."\nWhen: ".date('M d, Y', strtotime($request->event_date))." - ".$request->event_time."\nWhere: ".$request->event_location."";
                $ch = curl_init();
                foreach($smstoken as $st) {
                    curl_setopt($ch, CURLOPT_URL, $st->url);
                }
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"data\":{\"addresses\":[\"$addresses\"],\"message\":\"$sms\",\"target_device_iden\":\"$mobile_iden\"}}");

                $headers = [];
                $headers[] = 'Access-Token: '.$mobile_token;
                $headers[] = 'Content-Type: application/json';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }
                
                Notify::create([
                    'userid' => $ben->userid,
                    'program_id' => $ben->program,
                    'title' => $event->id,
                    'date' => $request->event_date,
                    'status' => 1,
                    'type' => 1
                ]);

            }
        }

        if(Auth::user()->type == 2) {

            $event = Event::create([
                'title' => $request->event_title,
                'date' => $request->event_date,
                'program' => Auth::user()->Program->id,
                'location' => $request->event_location,
                'time' => $request->event_time
            ]);

            $beneficiaries = ProgramType::where(['program' => Auth::user()->Program->id])->get();

            foreach($beneficiaries as $ben) {

                foreach($smstoken as $st) {
                    $mobile_iden = $st->mobile_identity; // as you have copied from the url, explained above
                    $mobile_token = $st->access_token; // as per your creation of token
                }

                $addresses = $ben->Beneficiary->contact_number; // mobile number to send text to
                $sms = "Hi Good Day! This is MSWDO Bontoc \n\nWhat: ".$request->event_title."\nWhen: ".date('M d, Y', strtotime($request->event_date))." - ".$request->event_time."\nWhere: ".$request->event_location."";
                $ch = curl_init();
                foreach($smstoken as $st) {
                    curl_setopt($ch, CURLOPT_URL, $st->url);
                }
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"data\":{\"addresses\":[\"$addresses\"],\"message\":\"$sms\",\"target_device_iden\":\"$mobile_iden\"}}");

                $headers = [];
                $headers[] = 'Access-Token: '.$mobile_token;
                $headers[] = 'Content-Type: application/json';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }

                Notify::create([
                    'userid' => $ben->userid,
                    'program_id' => $ben->program,
                    'title' => $event->id,
                    'date' => $request->event_date,
                    'status' => 1,
                    'type' => 1
                ]);

            }
        }
    
        return response()->json(['Error' => 0, 'Message'=> 'Event Created Successfully']);        
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        if(Auth::user()->type == 1) {
            Event::where(['id' => $request->eventid])->update([
                'title' => $request->event_title,
                'date' => $request->event_date,
                'program' => $request->program_type,
                'location' => $request->event_location,
                'time' => $request->event_time
            ]);

            $beneficiaries = ProgramType::where(['program' => $request->program_type])->get();

            foreach($beneficiaries as $ben) {

                Notify::where(['title' => $request->eventid])->update([
                    'date' => $request->event_date,
                    'status' => 1
                ]);

            }
        }

        if(Auth::user()->type == 2) {
            Event::where(['id' => $request->eventid])->update([
                'title' => $request->event_title,
                'date' => $request->event_date,
                'program' => Auth::user()->Program->id,
                'location' => $request->event_location,
                'time' => $request->event_time
            ]);

            $beneficiaries = ProgramType::where(['program' => Auth::user()->Program->id])->get();

            foreach($beneficiaries as $ben) {

                Notify::where(['title' => $request->eventid])->update([
                    'date' => $request->event_date,
                    'status' => 1
                ]);

            }
        }

        return response()->json(['Error' => 0, 'Message'=> 'Event Updated Successfully']);        
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        Event::where(['id' => $request->eventid])->delete();

        Notify::where(['title' => $request->eventid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Event Deleted Successfully']);       
    }
}
