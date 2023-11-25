<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExerciseController extends Controller
{

    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function insert(Request $request, $id){

        $workout = Workout::findOrFail($id);
        if(!$workout->user_id = auth()->id()) return redirect('home');
        return view('exercise.insert', compact('workout'));
    }

    public function insert_exercise(Request $request)
    {
        // Validate the request data using the rules defined in the Exercise model
        $validator = Validator::make($request->all(), Exercise::$rules);

        // If validation fails, return a response indicating the validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $exercise = new Exercise($request->all());
        $exercise->save();

        // Redirect or return a response as needed
        return redirect()->route('home'); // Replace 'your.route.name' with the actual route
    }

}
