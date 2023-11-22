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


    public function index(){
        return view('routine.index');
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
