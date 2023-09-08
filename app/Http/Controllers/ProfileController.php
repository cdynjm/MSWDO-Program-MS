<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\FocalPerson;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create()
    {
        return view('pages.profile');
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request)
    {

        if($request->old_password != '' && $request->new_password != '') {

            foreach(User::where(['id' => Auth::user()->id])->get() as $verify) {

                if(Hash::check($request->old_password, $verify->password)) {

                    User::where(['id' => Auth::user()->id])->update([
                        'password' => Hash::make($request->new_password)
                    ]);
                }

                else {
                    $request->session()->flash('password-status', 'Your Old Password did not match out records.');
                    return back();
                }
            } 
        }

        $user = request()->user();
        $attributes = request()->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
            'name' => 'required',
            'phone' => 'required|max:20',
            'about' => 'required:max:150',
            'location' => 'required'
        ]);

        auth()->user()->update($attributes);

        if(Auth::user()->type == 2) {

            FocalPerson::where(['id' => Auth::user()->userid])->update([
                'name' => $request->name,
                'contact_number' => $request->phone,
                'address' => $request->location
            ]);

        }

        if(Auth::user()->type == 3) {

            Beneficiary::where(['id' => Auth::user()->userid])->update([
                'name' => $request->name,
                'contact_number' => $request->phone,
            ]);

        }
        $request->session()->flash('profile-status', 'Your Profile updated successfully.');
        return back();
    
    }
}
