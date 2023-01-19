<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }
 
    public function authenticate(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt($request->only('username', 'password'))) {
                return redirect('/');
            } else {
            return redirect('/login')->with('success', 'Selamat datang ' . auth()->user()->level . ' !');
        }
    }
 
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
    
}
