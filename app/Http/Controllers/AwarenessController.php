<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use Illuminate\Http\Request;

class AwarenessController extends Controller
{
    // Only lets auth users access this page
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        // Gets the current authenticated user
        $user = auth()->user();

        // Gets an array of metrics names
        $metrics = $user->metrics->sortBy(function ($metric) {
            // Assigning custom weights to input types for sorting
            $weights = [
                'text' => 1,
                'dropdown' => 2,
                'textarea' => 3,
            ];

            return $weights[$metric->input_type] ?? 0;
        });

        $metricNames = $metrics->pluck('name');
        $inputTypes = $metrics->pluck('input_type');

        return view('posts.index', [
            'metricNames' => $metricNames,
            'inputTypes' => $inputTypes
        ]);
    }

    public function store(Request $request)
    {   
        // Gets each metric created by a user
        $metrics = $request->user()->metrics;
        
        // Check if user has already made an entry today
        if ($request->user()->hasEntryForToday()) {
            return back()->with('error', 'You have already made an entry for today.');
        }

        // Create rules for each input field
        $rules = [];
        foreach($metrics as $index => $metric)
        {
            $rules[$metric->name] = 'required';
        }

        $this->validate($request, $rules);

        // Create a entry
        foreach($metrics as $index => $metric){

            $request->user()->entries()->create([
                'metric_id' => $metric->id,
                'value' => $request->input($metric->name),
            ]);
        }

        return back()->with('status', 'Thank you for sharing your awareness today! Keep up the good work on your journey');

    }
}

