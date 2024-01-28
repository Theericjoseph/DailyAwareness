<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class UserHistoryController extends Controller
{   
    // Only lets authenticated users view this page
    public function __contruct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user)
    {
        // Ensure users can only view their own activity through Policies
        $this->authorize('view', $user);

        return view('user.index',[
            'user' => $user,
        ]);
    }

    public function search(Request $request, User $user)
    {
        // // Ensure users can only view their own activity through Policies
        // $this->authorize('viewHistory', $user);

        $this->validate($request,[
            'date' => 'required|date_format:d-m-Y',
        ]);
        // Gets the input from the form
        $date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');

        // Get user's entries for the specified date
        $entries = $user->entries()->whereDate('created_at', $date)->get();

        // Get all metrics for the user
        $metrics = $user->metrics->sortBy(function($metric){
            // Assigning weights to input types for sorting
            $weights = [
                'text' => 1,
                'dropdown' => 2,
                'textarea' => 3
            ];

            return $weights[$metric->input_type] ?? 0;
        });

        return view('user.index', [
            'user' => $user,
            'entries' => $entries,
            'metrics' => $metrics,
            'date' => $request->date,
        ]);
    }
}
