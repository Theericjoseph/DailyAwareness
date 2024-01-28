<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // Only lets auth users access this page
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout()
    {
        // Log the user out
        auth()->logout();

        // Redirect back to home
        return redirect()->route('home');
    }
}
