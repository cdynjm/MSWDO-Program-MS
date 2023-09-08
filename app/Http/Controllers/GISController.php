<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Barangay;
use App\Models\Program;
use App\Models\ProgramType;

class GISController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {

        $barangay = Barangay::orderBy('brgy', 'ASC')->get();

        $request->session()->put('program', 0);

        if(Auth::user()->type == 1) {

            $programs = Program::orderBy('program', 'ASC')->get();

            $default = 0;

            return view('pages.GIS', compact('barangay', 'programs', 'default'));
        }

        if(Auth::user()->type == 2) {
            
            $default = 1;
    
            $programtype = ProgramType::where(['program' => Auth::user()->Program->id])->get();

            return view('pages.GIS', compact('barangay', 'default', 'programtype'));
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchMap(Request $request) {

        if(Auth::user()->type == 1) {

            $programs = Program::orderBy('program', 'ASC')->get();

            $barangay = Barangay::orderBy('brgy', 'ASC')->get();
                
            $programtype = ProgramType::where(['program' => $request->program_type])->get();
            
            $request->session()->put('program', $request->program_type);

            $default = 1;

            return view('pages.GIS', compact('barangay', 'programs', 'programtype', 'default'));

        }

    }
}
