<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', ['title' => 'Login']);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        if(Auth::attempt($validated))
        {
            $request->session()->regenerate();

            if(auth()->user()->role_id === 1)
            {
                return redirect(route('guru.dashboard'));
            } else if(auth()->user()->role_id === 2)
            {
                return redirect(route('admin.dashboard'));
            }
        }

        return back()->with([
            'error' => 'Username atau password tidak sesuai',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login.index'));
    }
}
