<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('Auth.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|exists:users',
            'password'=>'required'
        ]);
        $email=$request['email'];
        $password=$request['password'];
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error','Authentication failed');
        }
    }
}
