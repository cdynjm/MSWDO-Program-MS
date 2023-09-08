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

class TransactionController extends Controller
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
            $transaction_history = TransactionHistory::orderBy('created_at', 'DESC')->get();
        }

        if(Auth::user()->type == 2) {
            $transaction_history = TransactionHistory::where(['program' => Auth::user()->Program->id])->orderBy('created_at', 'DESC')->get();
        }

        if(Auth::user()->type == 3) {
            $transaction_history = TransactionHistory::where(['userid' => Auth::user()->userid])->orderBy('created_at', 'DESC')->get();
        }

        $request->session()->put('program', 0);

        $request->session()->put('brgy', 0);

        return view('pages.transaction-history', compact('programs', 'barangay', 'transaction_history'));
        
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchTransaction(Request $request) {

        $programs = Program::orderBy('program', 'ASC')->get();

        $barangay = Barangay::orderBy('brgy', 'ASC')->get();

        if(Auth::user()->type == 1) {

            if($request->barangay == 0) {
                $transaction_history = TransactionHistory::where(['program' => $request->program_type])->get();
            }
            if($request->barangay != 0) {
                $transaction_history = TransactionHistory::where(['program' => $request->program_type])->where(['address' => $request->barangay])->get();
            }

            $request->session()->put('program', $request->program_type);

        }
        
        if(Auth::user()->type == 2) {

            if($request->barangay == 0) {
                $transaction_history = TransactionHistory::where(['program' => Auth::user()->Program->id])->get();
            }
            if($request->barangay != 0) {
                $transaction_history = TransactionHistory::where(['program' => Auth::user()->Program->id])->where(['address' => $request->barangay])->get();
            }

            $request->session()->put('program', 0);
        }

        $request->session()->put('brgy', $request->barangay);

        $default = 0;

        return view('pages.transaction-history', compact('programs', 'barangay', 'default', 'transaction_history'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        foreach($request->transaction_id as $key => $value) {
            TransactionHistory::where(['id' => $value])->delete();
        }

        return response()->json(['Error' => 0, 'Message'=> 'Payment transaction history deleted successfully.']);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchKeyup(Request $request) {

        $search = $request->search_transaction;
        
        if(Auth::user()->type == 1) {

            if($request->barangay == 0) {

                if($request->program == 0) {
                    $transaction_history = TransactionHistory::whereHas('Beneficiary', function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    })->get();
                }
                if($request->program != 0) {
                    $transaction_history = TransactionHistory::where(['program' => $request->program])->whereHas('Beneficiary', function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    })->get();
                }
            }

            if($request->barangay != 0) {
                $transaction_history = TransactionHistory::where(['address' => $request->barangay])->whereHas('Beneficiary', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->get();
            }

        }

        if(Auth::user()->type == 2) {

            if($request->barangay == 0) {
                $transaction_history = TransactionHistory::where(['program' => Auth::user()->Program->id])->whereHas('Beneficiary', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->get();
            }

            if($request->barangay != 0) {
                $transaction_history = TransactionHistory::where(['program' => Auth::user()->Program->id])->where(['address' => $request->barangay])->whereHas('Beneficiary', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->get();
            }

        }

        return view('pages.tables.transaction-table', compact('transaction_history'));
    }
}
