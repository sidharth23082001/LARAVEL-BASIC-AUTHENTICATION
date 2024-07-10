<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->check()){
            return view('dashboard');
        }
        else{
            return redirect('login');
        }
    }
}
