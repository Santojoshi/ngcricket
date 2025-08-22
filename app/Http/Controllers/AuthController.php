<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function admin(){
        if (!empty(Auth::check()) && Auth::user()->is_admin = 1) {
            return redirect('admin/dashboard');
        }

        return view('admin.auth.login');
    }
    public function admin_login(Request $request){

        $remember = !empty($request-> remember) ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin'=> 1], $remember))
        {
            return view('admin.pannel.dashboard');
        }
        else
        {
            return redirect()->back()->with('error', "Please enter correct details");
        }

    }

    public function admin_logout(){

        auth::logout();

        return redirect('admin');
    }
}
