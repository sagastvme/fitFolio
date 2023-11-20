<?php

namespace App\Http\Controllers;

use App\Models\LastVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Stevebauman\Location\Facades\Location;

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
    public function index(Request $request)
    {
        $this->setLastVisitLocation($request);
        $lastVisitSession = null;
        if (Auth::user()) {   // Check is user logged in
            return view('home');
        }
         return view('et');

    }

    private function setLastVisitLocation(Request $request)
    {
        $lastVisitSession = session('lastVisit');

        if (!$lastVisitSession) {
            $location = Location::get('https://' . $request->ip());
            $lastVisitSession = [$location->regionName, $location->countryCode];
        } else {
            $lastVisitSession = explode(' ', $lastVisitSession);
        }
        [$region, $country] = $lastVisitSession;
        $lastVisit = LastVisit::orderBy('id', 'DESC')->firstOrNew();
        if ($lastVisit->region != $region || $lastVisit->country != $country) {
            $lastVisit->update(['region' => $region, 'country' => $country]);
        }
        $sessionValue =  $lastVisit->region . " " . $lastVisit->country;
        $request->session()->put('lastVisit', $sessionValue);
    }

}
