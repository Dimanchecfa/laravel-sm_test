<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index ()
    {
       if(Auth::user()) {
           return redirect()->intended('/admin/category');
       }
       else {
           return view('pages.app.home');
       }
    }

    public function home_redirect() {
        if(Auth::user()) {
            return redirect()->intended('/admin/category');
        }
        else {
            return redirect()->intended('/product');
        }
    }
}
