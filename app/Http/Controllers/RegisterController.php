<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Facades\App;

class RegisterController extends Controller
{
    public function index(Request $request, $locale = 'en'): View
    {
        if (in_array($locale, ['en', 'es', 'fr', 'it', 'pt','de','cn'])) {
            App::setLocale($locale);
echo App::getLocale();
        }


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

    public  function  test2(Request $request){
        echo App::getLocale();
        $lang = trans('auth.throttle'); // Example translation
        $welcomeMessage = 'test'; // Replace with your actual message
        $title = 'Test'; // Replace with your actual title

        return view('register', ['lang' => $lang, 'welcomeMessage' => $welcomeMessage, 'title' => $title]);

    }
}

