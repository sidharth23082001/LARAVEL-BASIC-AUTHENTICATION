<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(Request $request){
        if(auth()->check()){
            return redirect()->route('dashboard');
        }else{
        return view('login');
        }
    }
    public function dashboard(){
        if(auth()->check()){
            return redirect()->route('dashboard');;
        }else{
        return view('login');
        }
    }

    public function dologin(){
       if(auth()->attempt([
        'email' => request('email'),
        'password' => request('password')
        ])){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login')->with('message','Invalid User');
        }
    }

public function register(){
        return view('register');
}

public function registeruser(Request $request){
    $request->validate([
        'email' => 'required|unique:users',
        'password' => 'required',
    ]);
    $user = User::create([
    'user_id' => substr(md5(time()), 0, 8),
    'name' => request('name'),
    'email' => request('email'),
    'password' => request('password')
    ]);
    return redirect()->route('register')->with('message','New User Created Sucessfully,go back to SignIn');
}

public function logout(){
    auth()->logout();
    return redirect()->route('login');
}
}