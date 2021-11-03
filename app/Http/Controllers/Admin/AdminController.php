<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    function check (Request $request){
        $request->validate([
            
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
           
        ],
        [
             'email.exists'=>"this email is not exists in the table"
         ]
        );
    $creds=$request->only('email','password');
    if (Auth::guard('admin')->attempt($creds)){
        return redirect()->route('admin.home');
    }
    else{
        return redirect()->route('admin.login')->with('fail','incorrect credintials');
    }
    }
    function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }  
}
