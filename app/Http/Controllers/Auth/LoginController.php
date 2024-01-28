<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Only lets guest access this page
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to login
        if (!auth()->attempt($request->only('email', 'password')))
        {
            return(back()->with('status', 'Invalid login details'));
        }


        // Redirect
        return(redirect()->route('home')->with('status', 'Logged In'));
    }
}
