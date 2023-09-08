<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\Barangay;
use App\Models\User;
use App\Models\Beneficiary;
use App\Models\Payroll;
use App\Models\ProgramType;
use App\Models\TransactionHistory;
use App\Models\ChMessage;
use App\Models\Notify;

class BeneficiaryController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {

        $programs = Program::orderBy('program', 'ASC')->get();

        $barangay = Barangay::orderBy('brgy', 'ASC')->get();

        $request->session()->put('program', 0);

        $request->session()->put('brgy', 0);

        return view('pages.beneficiary', compact('programs', 'barangay'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function search(Request $request) {

        $programs = Program::orderBy('program', 'ASC')->get();

        $barangay = Barangay::orderBy('brgy', 'ASC')->get();
        
        if(Auth::user()->type == 1) {
            
            if($request->program_type != 6) {

                if($request->barangay != 0) {
                    $programtype = ProgramType::where(['program' => $request->program_type])->where(['address' => $request->barangay])->get();
                }
                if($request->barangay == 0) {
                    $programtype = ProgramType::where(['program' => $request->program_type])->get();
                }

                $request->session()->put('program', $request->program_type);

                $request->session()->put('brgy', $request->barangay);

                return view('pages.beneficiary', compact('programs', 'barangay', 'programtype'));
            }

            if($request->program_type == 6) {

                if($request->barangay == 0) {
                    $beneficiary = Beneficiary::orderBy('name', 'ASC')->get();
                }
                if($request->barangay != 0) {
                    $beneficiary = Beneficiary::where(['address' => $request->barangay])->orderBy('name', 'ASC')->get();
                }

                $programtype = ProgramType::get();

                $request->session()->put('brgy', $request->barangay);

                $request->session()->put('program', $request->program_type);

                return view('pages.beneficiary', compact('programs', 'barangay', 'beneficiary', 'programtype'));
            }
          
        }
        if(Auth::user()->type == 2) {
            
            if($request->barangay != 0) {
                $programtype = ProgramType::where(['program' => Auth::user()->Program->id])->where(['address' => $request->barangay])->get();
            }
            if($request->barangay == 0) {
                $programtype = ProgramType::where(['program' => Auth::user()->Program->id])->get();
            }

            $request->session()->put('program', Auth::user()->Program->id);

            $request->session()->put('brgy', $request->barangay);

            return view('pages.beneficiary', compact('programs', 'barangay', 'programtype'));
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        $beneficiary = Beneficiary::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'birthdate' => $request->birthdate
        ]);

        User::create([
            'userid' => $beneficiary->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'type' => 3,
            'active_status' => 0,
            'avatar' => ''
        ]);

        foreach($request->programtype as $key => $program) {
            
            if($program == 5) {
                $programtype = ProgramType::create([
                    'userid' => $beneficiary->id,
                    'control_number' => $request->control_number[$program],
                    'program' => $program,
                    'disability' => $request->disability,
                    'address' => $request->address,
                    'status' => 1
                ]); 
            }

            if($program != 5) {
                $programtype = ProgramType::create([
                    'userid' => $beneficiary->id,
                    'control_number' => $request->control_number[$program],
                    'program' => $program,
                    'address' => $request->address,
                    'status' => 1
                ]); 
            }

            Payroll::create([
                'userid' => $beneficiary->id,
                'programtype_id' => $programtype->id,
                'balance' => 0,
                'status' => 0,
                'program' => $program
            ]);
        }

        return response()->json(['Error' => 0, 'Message'=> 'Beneficiary Created Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

       Beneficiary::where(['id' => $request->beneficiary_id])->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
        ]);

        ProgramType::where(['userid' => $request->beneficiary_id])->where(['program' => $request->program_id])->update([
            'address' => $request->address,
            'status' => $request->status
        ]);
        
        TransactionHistory::where(['userid' => $request->beneficiary_id])->where(['program' => $request->program_id])->update([
            'address' => $request->address
        ]);

        User::where(['userid' => $request->beneficiary_id])->update([
            'name' => $request->name,
            'phone' => $request->contact_number
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Beneficiary Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateProgram(Request $request) {

        foreach($request->check_program as $key => $value) {

            $program_exist = ProgramType::where(['userid' => $request->userid])->where(['program' => $value])->count();

            if($program_exist == 1) {

                if($value != 5) {
                    ProgramType::where(['userid' => $request->userid])->where(['program' =>$value])->update([
                        'control_number' => $request->control_number[$value]
                    ]);
                }

                if($value == 5) {
                    ProgramType::where(['userid' => $request->userid])->where(['program' =>$value])->update([
                        'control_number' => $request->control_number[$value],
                        'disability' => $request->disability
                    ]);
                }
            }
            else {

                if($value == 5) {
                    $programtype = ProgramType::create([
                        'userid' => $request->userid,
                        'control_number' => $request->control_number[$value],
                        'program' => $value,
                        'disability' => $request->disability,
                        'address' => $request->address,
                        'status' => 1
                    ]); 
                }
    
                if($value != 5) {
                    $programtype = ProgramType::create([
                        'userid' => $request->userid,
                        'control_number' => $request->control_number[$value],
                        'program' => $value,
                        'address' => $request->address,
                        'status' => 1
                    ]); 
                }
    
                Payroll::create([
                    'userid' => $request->userid,
                    'programtype_id' => $programtype->id,
                    'balance' => 0,
                    'status' => 0,
                    'program' => $value
                ]);

            }
        }

        return response()->json(['Error' => 0, 'Message'=> 'Beneficiary Program Updated Successfully']); 
    
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchKeyup(Request $request) {

        $search = $request->search_beneficiary;
        
        $id = [1,2,3,4,5];

        $pages = [
            'pages.tables.aics-table',
            'pages.tables.eccd-table',
            'pages.tables.senior-citizen-table',
            'pages.tables.solo-parent-table',
            'pages.tables.pwd-table'
        ];

        if(Auth::user()->type == 1) {

            if($request->program != 0) {
                
                if($request->program != 6) {

                    if($request->barangay == 0) {
                        $programtype = ProgramType::where(['program' => $request->program])->whereHas('Beneficiary', function ($query) use ($search) {
                            $query->where('name', 'like', '%'.$search.'%');
                        })->get();
                    }
                    if($request->barangay != 0) {
                        $programtype = ProgramType::where(['program' => $request->program])->where(['address' => $request->barangay])->whereHas('Beneficiary', function ($query) use ($search) {
                            $query->where('name', 'like', '%'.$search.'%');
                        })->get();
                    }

                    for ($loop = 0; $loop <= 4; $loop++) {
                        if($request->program == $id[$loop]) {
                            return view($pages[$loop], compact('programtype'));
                        }
                    }
                }

                if($request->program == 6) {

                    if($request->barangay == 0) {
                        $beneficiary = Beneficiary::where('name', 'like', '%'.$search.'%')->orderBy('name', 'ASC')->get();
                    }
                    if($request->barangay != 0) {
                        $beneficiary = Beneficiary::where(['address' => $request->barangay])->where('name', 'like', '%'.$search.'%')->orderBy('name', 'ASC')->get();
                    }
    
                    $programtype = ProgramType::get();

                    $programs = Program::orderBy('program', 'ASC')->get();
                    
                    return view('pages.tables.all-programs-table', compact('programtype', 'beneficiary', 'programs'));
                }
            }

        }

        if(Auth::user()->type == 2) {

            if($request->barangay == 0) {
                $programtype = ProgramType::where(['program' => Auth::user()->Program->id])->whereHas('Beneficiary', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->get();
            }
            if($request->barangay != 0) {
                $programtype = ProgramType::where(['program' => Auth::user()->Program->id])->where(['address' => $request->barangay])->whereHas('Beneficiary', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->get();
            }

            for ($loop = 0; $loop <= 4; $loop++) {
                if(Auth::user()->Program->id == $id[$loop]) {
                    return view($pages[$loop], compact('programtype'));
                }
            }
            
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        Beneficiary::where(['id' => $request->userid])->delete();
        User::where(['userid' => $request->userid])->delete();
        TransactionHistory::where(['userid' => $request->userid])->delete();
        ProgramType::where(['userid' => $request->userid])->delete();
        Payroll::where(['userid' => $request->userid])->delete();
        Notify::where(['userid' => $request->userid])->delete();
        foreach(User::where(['userid' => $request->userid])->get() as $delete) { ChMessage::where(['from_id' => $delete->id])->delete(); }

        return response()->json(['Error' => 0, 'Message'=> 'Beneficiary Deleted Successfully']); 

    }
}
