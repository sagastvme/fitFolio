<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lang = Lang::locale();
        $test = trans('welcome.header');
        if (Auth::user()) {   // Check is user logged in
            return view('home');
        }
        return view('et', compact('lang', 'test'));

    }

    private function setLastVisitLocation(String $region, String $country)
    {
        //get the last location from the db
        //compare if they are the same
        //if not update else keep it
        //  set a cookie or session with the value
//if the session exists compare if its different to the one in the db
        

        $request->session()->put('lang', $locale);
    }
}
