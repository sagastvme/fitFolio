<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function setLanguage(Request $request, $locale): RedirectResponse
    {
           $request->session()->put('lang', $locale);
           app()->setLocale($locale);
           return redirect()->route('home');
    }
}
