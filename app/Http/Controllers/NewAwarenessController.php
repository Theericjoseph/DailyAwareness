<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewAwarenessController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user)
    {
        // Ensure authorized users can only access the page 
        $this->authorize('view', $user);

        return view('user.new',[
            'user' => $user
        ]);
    }

    public function store(Request $request, User $user)
    {
        // Grabs all the names from the form
        $metricNames = $request->input('names');
        
        // Validate
        if (empty($metricNames[0])) {
            return back()->with('error', 'Enter at least one new awareness');
        }

        foreach ($metricNames as $metricName) {
            if ($metricName != '')
            {
                $metricName = Str::replace(' ', '_', $metricName);
                $user->metrics()->create([
                    'name' => $metricName,
                    'input_type' => 'text',
                ]);
            }
        }
        

        return redirect()->route('awareness')->with('status', 'New awareness added');
        
    }
}
