<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class HomeController extends Controller
{
    public  function  index(Request $request)
    {
        $header = trans('welcome.header'); // Example translation
        $body = trans('welcome.body'); // Replace with your actual message
        $footer = trans('welcome.footer'); // Replace with your actual title
        return view('register', compact('header', 'body', 'footer'));
    }
}
