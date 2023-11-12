<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Facades\App;

class RegisterController extends Controller
{
    public function index(Request $request, $locale = 'en'): View
    {
        $header = trans('welcome.header'); // Example translation
        $welcomeMessage = 'Welcome Message'; // Replace with your actual message
        $title = 'Page Title'; // Replace with your actual title
        $body = 'Page Title';
        $footer = 'Page Title';
        return view('register', compact('header',  'welcomeMessage', 'title', 'body','footer'));
    }

}

