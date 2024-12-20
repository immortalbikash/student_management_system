<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthenticationController extends Controller
{

    public function authenticate(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // exit;

        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            //if login success
            return redirect()->route('home')->with('success', 'Login success');
            //admin@gmail.com password  -- email and password
            // return view('front');
            // return view('front_end.home');
        }
        else{
            echo "<pre>";
            print_r('username or password do not match');
            exit;
            // return view('front_end.login')->with('failed', 'Username or Password do not match.');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
