<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\ProgramType;
use App\Models\FocalPerson;
use App\Models\Beneficiary;
use App\Models\TransactionHistory;
use App\Models\Payroll;
use App\Models\Notify;

class DashboardController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function index()
    {
        if(Auth::user()->type == 1) {

            $count_program = Program::count();
            $count_person = FocalPerson::count();
            $count_beneficiary = Beneficiary::count();
            $payroll_list = ProgramType::whereHas('Payroll', function ($query) {
                $query->where(['status' => 1]);})->limit(5)->get();
            $transaction_history = TransactionHistory::orderBy('created_at', 'DESC')->limit(5)->get();

            return view('dashboard.index', compact('count_program', 'count_person', 'count_beneficiary', 'payroll_list', 'transaction_history'));
        }
        if(Auth::user()->type == 2) {

            $count_beneficiary = ProgramType::where(['program' => Auth::user()->Program->id])->count();
            $program_name = Program::where(['focal_person' => Auth::user()->userid])->get();
            $active = ProgramType::where(['status' => 1])->where(['program' => Auth::user()->Program->id])->count();
            $inactive = ProgramType::where(['status' => 0])->where(['program' => Auth::user()->Program->id])->count();
            $payroll_list = ProgramType::where(['program' => Auth::user()->Program->id])->limit(5)->get();
            $transaction_history = TransactionHistory::where(['program' => Auth::user()->Program->id])->orderBy('created_at', 'DESC')->limit(5)->get();

            return view('dashboard.index', compact('count_beneficiary', 'program_name', 'active', 'inactive', 'payroll_list', 'transaction_history'));
        }

        if(Auth::user()->type == 3) {

            $count_transaction = TransactionHistory::where(['userid' => Auth::user()->userid])->count();
            $balance = Payroll::where(['userid' => Auth::user()->userid])->get();
            
            return view('dashboard.index', compact('count_transaction', 'balance'));
        }
    }
}
