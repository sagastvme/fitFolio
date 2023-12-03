<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class RoutineController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function add_workout(){
        return view('routine.insert');
    }


    public function index(){
        $daysOfWeekOrder = [
            'Monday' => 1,
            'Tuesday' => 2,
            'Wednesday' => 3,
            'Thursday' => 4,
            'Friday' => 5,
            'Saturday' => 6,
            'Sunday' => 7,
        ];
        $workouts = auth()->user()->workouts->sortBy(function ($workout) use ($daysOfWeekOrder) {


            return $daysOfWeekOrder[$workout['day']];
        });

        $uniqueDays = $workouts->unique('day')->pluck('day')->values();

        $totalUniqueDaysCount = count($uniqueDays);


        return view('routine.index', compact('workouts', 'totalUniqueDaysCount', 'daysOfWeekOrder'));
    }
    public  function insert(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'alpha_num'],
            'day'=>['required', 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday'],
            'duration'=>['required', 'integer']
        ]);
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        Workout::create([
            'alternate_id' => Str::uuid()->toString(),
            'user_id'=> \auth()->id(),
            'name'=>$request->input('name'),
            'day'=>$request->input('day'),
            'duration'=>$request->input('duration'),
        ]);


        return redirect()->back();
    }
}
