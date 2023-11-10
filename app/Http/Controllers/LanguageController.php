<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function setLanguage(Request $request, $locale='en'): RedirectResponse
    {

        if (in_array($locale, ['en', 'es', 'fr', 'it', 'pt','de','cn'])) {
            $request->session()->put('lang', $locale);
            app()->setLocale($locale);
        }
        return redirect()->route('home');
    }
}
