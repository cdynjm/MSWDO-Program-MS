<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\ProgramType;
use App\Models\FocalPerson;
use App\Models\User;

class ProgramController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        $person = FocalPerson::create([
            'name' => $request->full_name,
            'address' => $request->address,
            'contact_number' => $request->contact_number
        ]);

        User::create([
            'userid' => $person->id,
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => $request->password,
            'type' => 2
        ]);

        Program::create([
            'program' => $request->program,
            'description' => $request->description,
            'focal_person' => $person->id
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Program Created Successfully']); 
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read() {

        if(Auth::user()->type == 1) {
            $programs = Program::orderBy('program', 'ASC')->get();
        }

        if(Auth::user()->type == 2) {
            $programs = Program::where(['id' => Auth::user()->Program->id])->orderBy('program', 'ASC')->get();
        }

        if(Auth::user()->type == 3) {
            $programs = ProgramType::where(['userid' => Auth::user()->userid])->orderBy('program', 'ASC')->get();
        }

        return view('pages.programs', compact('programs'));
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        FocalPerson::where(['id' => $request->focalpersonid])->update([
            'name' => $request->full_name,
            'address' => $request->address,
            'contact_number' => $request->contact_number
        ]);

        User::where(['userid' => $request->focalpersonid])->update([
            'name' => $request->full_name
        ]);

        Program::where(['id' => $request->programid])->update([
            'program' => $request->program,
            'description' => $request->description
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Program Updated Successfully']); 
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        FocalPerson::where(['id' => $request->focalpersonid])->delete();

        Program::where(['id' => $request->programid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Program Deleted Successfully']); 
    }
}
