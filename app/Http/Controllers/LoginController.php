<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check()) {
            dd(Auth::guard('web')->user());
        }
        return view('pages.auth.login');
    }


    public function login(LoginRequest $request) {
        if (!Auth::attempt($request->only('email', 'password'), true) &&
            !Auth::guard('creator')->attempt($request->only('email', 'password'), true)) {
            Log::error('Login failed', ['email' => $request->email]);
            return back()->withErrors(['email' => "The email is invalid"]);
        }
        $request->session()->regenerate();
        return redirect()->back();
    }
}
