<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use App\Models\Exercise;
use App\Models\ExerciseMark;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Psy\Util\Str;

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

    public function render_delete(Request $request, $id){
        $workout = Workout::findOrFail($id);
        if(!$workout->user_id = auth()->id()) return redirect('home');
//        return view('exercise.insert', compact('workout'));
        $exercises = $workout->exercises;
    return view('exercise.render_delete', compact('exercises', 'workout'));
    }

    public function delete(Request $request)
    {
           $validator = Validator::make($request->all(), [
            'workout' => ['required', 'integer'],
            'selected_exercises' => ['required', 'array', 'min:1'],
        ],
        ['selected_exercises.required'=>'Please select an exercise to delete']);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $workout = Workout::findOrFail($request->get('workout'));
        if(!$workout->user_id = auth()->id()) return redirect('home');
        $exercises = $workout->exercises;
        $selected_exercises= $request->get('selected_exercises');
        foreach ($selected_exercises as $del_exercise) {
            if ($exercises->contains('id', $del_exercise)) {
                Exercise::findOrFail($del_exercise)->delete();

            }
        }
        return redirect()->route('workout.show', ['id' => $workout->getId()]);


    }

    public function track(MonthlyUsersChart $chart, Request $request, $id, $ex_id){
        $workout = Workout::findOrFail($id);
        if(!$workout->user_id = auth()->id()) return redirect('home');
        $exercise = $workout->exercises()->where('id', $ex_id)->firstOrFail();
        $marks = $exercise->marks;
        //call new chart method with properties
        //send parameters to function and we are done
        $chart = $chart->build('Title', 'subtitle', 'titlex', 'titley', 'datax', 'datay','axis');
        //not working lol
        return view('exercise.track', compact('marks','chart' ,'exercise', 'id', 'ex_id'));
    }

    public function add_track(Request $request, $id, $ex_id){
        $workout = Workout::findOrFail($id);
        if(!$workout->user_id = auth()->id()) return redirect('home');
        $exercise = $workout->exercises()->where('id', $ex_id)->firstOrFail();
        $latest = $exercise->marks->last() ?? 0;
        //dar la plasta lol
        $latest = is_object($latest) ? $latest->getMark() : 0;
        return view('marks.insert', compact( 'exercise', 'latest'));
    }
    public function insert_track(Request $request, $id, $ex_id){
        $workout = Workout::findOrFail($id);
        if(!$workout->user_id = auth()->id()) return redirect('home');
        $exercise = $workout->exercises()->where('id', $ex_id)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'mark' => ['required', 'integer']]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $mark = new ExerciseMark([
            'mark' => $request->get('mark'),
            'alternate_id'=>uuid_create()
        ]);

        // Associate the ExerciseMark with the Exercise
        $exercise->marks()->save($mark);

        return redirect()->route('exercise.track', ['id' => $id, 'ex_id' => $ex_id]);

    }

    public function show_delete_track(Request $request, $id, $ex_id)
    {
        $workout = Workout::findOrFail($id);
        if(!$workout->user_id = auth()->id()) return redirect('home');
        $exercise = $workout->exercises()->where('id', $ex_id)->firstOrFail();
        $marks = $exercise->marks;
        if ($exercise->getType()==='Cardio'){
            $units = 'min';
        }else{
            $units='kg';
        }
        return view('exercise.show_delete', compact('marks',  'id', 'exercise', 'units'));
    }

    public function delete_track(Request $request, $id, $ex_id){
        $validator = Validator::make($request->all(), [
            'selected_marks' => ['required', 'array', 'min:1'],
        ],
            ['selected_marks.required'=>'Please select a tracking value to delete']);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $workout = Workout::findOrFail($id);
        if(!$workout->user_id = auth()->id()) return redirect('home');
        $exercise = $workout->exercises()->where('id', $ex_id)->firstOrFail();
        $db_marks = $exercise->marks;
        $marks = $request->get('selected_marks');
        foreach ($marks as $mark) {
            if (  $db_marks->where('id', $mark)   ){
                ExerciseMark::findOrFail($mark)->delete();
            }
}

        return redirect()->route('exercise.track', ['id'=>$id, 'ex_id'=>$ex_id]);

    }



}
