<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use illuminate\Support\Facades\Auth;
class DoctorController extends Controller
{
    function check (Request $request){
        $request->validate([
            
            'email'=>'required|email|exists:doctors,email',
            'password'=>'required|min:5|max:30'
           
        ],
        [
             'email.exists'=>"this email is not exists in the table"
         ]
        );
    $creds=$request->only('email','password');
    if (Auth::guard('doctor')->attempt($creds)){
        return redirect()->route('doctor.home');
    }
    else{
        return redirect()->route('doctor.login')->with('fail','incorrect credintials');
    }
    }
    function logout(){
        Auth::logout();
        return redirect('/doctor/login');
    }
}
