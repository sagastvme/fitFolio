<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    //
    public function  __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $workouts = $user->workouts;
        return view('workout.index', compact('workouts'));
    }

    public function insert(Request $request, $id)
    {
        $workout = Workout::findOrFail($id);
        if(!$workout->user_id = auth()->id()) return back();
        return view('workout.details', compact('workout'));
    }



}
