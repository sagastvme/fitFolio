<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Facades\App;

class RegisterController extends Controller
{
    public function index(Request $request, $locale): View
    {
        if (!in_array($locale, ['en', 'es', 'fr'])) {
            abort(400);
        }

        App::setLocale($locale);

        $lang = trans('auth.failed'); // Example translation
        $welcomeMessage = 'Welcome Message'; // Replace with your actual message
        $title = 'Page Title'; // Replace with your actual title

        return view('register', ['lang' => $lang, 'welcomeMessage' => $welcomeMessage, 'title' => $title]);
    }
    public function index2(Request $request): View
    {


       
        $lang = trans('auth.failed'); // Example translation
        $welcomeMessage = 'Welcome Message'; // Replace with your actual message
        $title = 'Page Title'; // Replace with your actual title

        return view('register', ['lang' => $lang, 'welcomeMessage' => $welcomeMessage, 'title' => $title]);
    }

    public  function  english(Request $request){
        return redirect('/en');
    }
}

