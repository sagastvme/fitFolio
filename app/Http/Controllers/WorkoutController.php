<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

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
    public function delete_workout(Request $request) {
        $validator = Validator::make($request->all(), [
            'workout_id' => [
                'required',
                'integer',
                Rule::exists('workouts', 'id')->where(function ($query) {
                    $query->where('user_id', auth()->id());
                }),
            ],
            'confirm_message' => ['required', 'string', 'in:Delete'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $workout = Workout::findOrFail($request->workout_id);
        $workout->delete();
        return redirect()->route('routine');
    }



}
