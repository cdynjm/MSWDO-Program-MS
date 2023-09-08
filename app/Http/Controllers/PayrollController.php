<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\ProgramType;
use App\Models\Barangay;
use App\Models\Beneficiary;
use App\Models\Payroll;
use App\Models\TransactionHistory;
use App\Models\Notify;
use App\Models\SMSToken;

class PayrollController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {

        $programs = Program::orderBy('program', 'ASC')->get();

        $barangay = Barangay::orderBy('brgy', 'ASC')->get();

        if(Auth::user()->type == 1) {
            $payroll_list = ProgramType::get();
        }

        if(Auth::user()->type == 2) {
            $payroll_list = ProgramType::where(['program' => Auth::user()->Program->id])->get();
        }

        $request->session()->put('program', 0);

        $request->session()->put('brgy', 0);

        $default = 0;

        return view('pages.payroll', compact('programs', 'barangay', 'default', 'payroll_list'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function search(Request $request) {

        if(Auth::user()->type == 1) {
            if($request->address != 0) {
                $beneficiary = ProgramType::where(['address' => $request->address])->orderBy('control_number', 'ASC')->get();
            }
            if($request->address == 0) {
                $beneficiary = ProgramType::orderBy('control_number', 'ASC')->get();
            }
        }

        if(Auth::user()->type == 2) {
            if($request->address != 0) {
                $beneficiary = ProgramType::where(['address' => $request->address])->where(['status' => 1])->where(['program' => Auth::user()->Program->id])->orderBy('control_number', 'ASC')->get();
            }
            if($request->address == 0) {
                $beneficiary = ProgramType::where(['program' => Auth::user()->Program->id])->where(['status' => 1])->orderBy('control_number', 'ASC')->get();
            }
        }
        $default = 1;

        return view('pages.tables.payroll-beneficiary-table', compact('beneficiary', 'default'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchPayroll(Request $request) {

        $programs = Program::orderBy('program', 'ASC')->get();

        $barangay = Barangay::orderBy('brgy', 'ASC')->get();

        if(Auth::user()->type == 1) {

            if($request->barangay == 0) {
                $payroll_list = ProgramType::where(['program' => $request->program_type])->get();
            }
            if($request->barangay != 0) {
                $payroll_list = ProgramType::where(['program' => $request->program_type])->where(['address' => $request->barangay])->get();
            }

            $request->session()->put('program', $request->program_type);

        }
        
        if(Auth::user()->type == 2) {

            if($request->barangay == 0) {
                $payroll_list = ProgramType::where(['program' => Auth::user()->Program->id])->get();
            }
            if($request->barangay != 0) {
                $payroll_list = ProgramType::where(['program' => Auth::user()->Program->id])->where(['address' => $request->barangay])->get();
            }

            $request->session()->put('program', 0);
        }

        $request->session()->put('brgy', $request->barangay);

        $default = 0;

        return view('pages.payroll', compact('programs', 'barangay', 'default', 'payroll_list'));
        
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        $smstoken = SMSToken::get();

        foreach($request->userid as $key => $program) {

            $balance = Payroll::where(['userid' => $program])->where(['program' => Auth::user()->Program->id])->get();

            foreach($balance as $bal) {
                Payroll::where(['userid' => $program])->where(['program' => Auth::user()->Program->id])
                ->update([
                    'balance' => $bal->balance + $request->cash,
                    'status' => 1
                ]);

                foreach($smstoken as $st) {
                    $mobile_iden = $st->mobile_identity; // as you have copied from the url, explained above
                    $mobile_token = $st->access_token; // as per your creation of token
                }

                $addresses = $bal->Beneficiary->contact_number; // mobile number to send text to
                $sms = "Hi Good Day! This is MSWDO Bontoc (".Auth::user()->Program->program.") \nYou have received ₱".number_format($request->cash, 2).". Your new account balance is ₱".number_format($bal->balance + $request->cash, 2).".";
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

            }

            Notify::create([
                'userid' => $program,
                'program_id' => Auth::user()->Program->id,
                'cash' => $request->cash,
                'title' => 'Cash Received',
                'status' => 1,
                'type' => 2
            ]);
        }

        return response()->json(['Error' => 0, 'Message'=> 'Payroll Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        foreach($request->payroll_id as $key => $value) {

            $payroll = Payroll::where(['id' => $value])->get();

            foreach($payroll as $pr) {
                
                TransactionHistory::create([
                    'userid' => $pr->userid,
                    'program' => $pr->program,
                    'programtype_id' => $pr->programtype_id,
                    'cash' => $pr->balance,
                    'address' => $pr->Beneficiary->address
                ]);

            }

            Payroll::where(['id' => $value])->update(['balance' => 0.00, 'status' => 0]);

        }

        return response()->json(['Error' => 0, 'Message'=> 'Cash Released Successfully']);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        foreach($request->payroll_id as $key => $value) {
            Payroll::where(['id' => $value])->update(['balance' => 0.00, 'status' => 0]);
        }

        return response()->json(['Error' => 0, 'Message'=> 'Balance was successfully reset to ₱0.00']);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchKeyup(Request $request) {

        $search = $request->search_payroll;
        
        if(Auth::user()->type == 1) {

            if($request->barangay == 0) {

                if($request->program == 0) {
                    $payroll_list = ProgramType::whereHas('Beneficiary', function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    })->get();
                }
                if($request->program != 0) {
                    $payroll_list = ProgramType::where(['program' => $request->program])->whereHas('Beneficiary', function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    })->get();
                }
            }

            if($request->barangay != 0) {
                $payroll_list = ProgramType::where(['program' => $request->program])->where(['address' => $request->barangay])->whereHas('Beneficiary', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->get();
            }

        }

        if(Auth::user()->type == 2) {

            if($request->barangay == 0) {
                $payroll_list = ProgramType::where(['program' => Auth::user()->Program->id])->whereHas('Beneficiary', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->get();
            }

            if($request->barangay != 0) {
                $payroll_list = ProgramType::where(['program' => Auth::user()->Program->id])->where(['address' => $request->barangay])->whereHas('Beneficiary', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->get();
            }

        }

        return view('pages.tables.payroll-table', compact('payroll_list'));
    }
}
