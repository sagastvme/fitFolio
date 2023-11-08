<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(Request $request): View
    {
        $lang = str_replace('_', '-', app()->getLocale());
        switch (strtolower($lang)) {
            case 'en':
                $lang = 'ENGLISH';
                break;
            case 'es':
                $lang = 'SPANISH';
                break;
            // Add more cases for other languages as needed
        }

        return view('register', ['lang' => $lang]);
    }
}
