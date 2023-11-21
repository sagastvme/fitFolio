<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function  index(){
        return view('update');
    }

    public function insert(Request $request){
        $validator = Validator::make($request->all(), [
            'weight' => ['required', 'integer', 'max:999'],
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $user->actual_weight = $request->input('weight');
        $user->save();
        return redirect()->route('profile');
    }



}
