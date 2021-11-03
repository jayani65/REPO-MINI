<?php

namespace App\Http\Controllers\User;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    function create (Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=\Hash::make($request->password);
        $save=$user->save();

        if ($save){
            return redirect()->back()->with('success','You have registered successfully');
        }
        else{
            return redirect()->back()->with('fail','Something wrong,Failed to register');   
        }


    }
    function check (Request $request){
        $request->validate([
            
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'
           
        ],[
            'email.exists'=>"this email is not exists in the table"
        ]
    );
    $creds=$request->only('email','password');
    if (Auth::attempt($creds)){
        return redirect()->route('user.home');
    }
    else{
        return redirect()->route('user.login')->with('fail','incorrect credintials');
    }
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
