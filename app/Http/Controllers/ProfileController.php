<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Stevebauman\Location\Facades\Location;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $locationData = Location::get('https://'.$request->ip());
        $location = $locationData->regionName . ", ". $locationData->countryCode;
        return view('profile.summary', compact('location'));

    }
}
