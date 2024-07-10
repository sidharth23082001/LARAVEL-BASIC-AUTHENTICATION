<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{

    public function login(){
        if(auth()->check()){
            return redirect('dashboard');
        }else{
        return view('login');
        }
    }
    

    public function dologin(){
       if(auth()->attempt([
        'email' => request('email'),
        'password' => request('password')
        ])){
            //return redirect()->action('DashboardController@index');
            return redirect('dashboard');
        }
        else{
            $returnMessage = "Invalid User";
            return redirect()->route('login')->with('success', $returnMessage);;
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
    $returnMessage = "User Created Succesfully";
            return redirect()->route('login')->with('success', $returnMessage);;
    }

public function logout(){
    auth()->logout();
    return redirect()->route('login');
}
}