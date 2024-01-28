<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class RegisterController extends Controller
{
    // Only lets guest access this page
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        try{

            $rules = [
                'name' => 'required|max:255',
                'username' => 'required|max:255',
                'email' => 'required|max:255|email',
                'password' => 'required|confirmed',
            ];
            //Validation
            $this->validate($request, $rules);

            // store
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Create default metrics for the user
            $this->createDefaultMetrics($user);

            // Redirect (login) or perform other actions
            return redirect()->route('login')->with('success', 'User registered successfully');

        } catch (QueryException $e) {
            // Check for specific error code indicating unique constraint violation
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) {
                // Unique constraint violation (e.g., duplicate entry for email or username)
                return redirect()->back()->withInput()->withErrors(['email' => 'Email already in use.']);
            }
        }
    }

    protected function createDefaultMetrics(User $user)
    {
        $defaultMetrics = [
            'How_many_hours_spent_doing_creative_work?' => 'text',
            'A_quality_score_for_the_day' => 'dropdown',
            'A_note_for_the_day' => 'textarea',
        ];

        foreach($defaultMetrics as $metricName => $inputType)
        {
            $user->metrics()->create([
                'name' => $metricName,
                'input_type' => $inputType,
            ]);
        }
    }

}


