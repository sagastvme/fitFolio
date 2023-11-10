<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'test2'])->name('register');
Route::get('/', [\App\Http\Controllers\RegisterController::class, 'test2'])->name('home');

Route::get('/lang/{language?}', [\App\Http\Controllers\LanguageController::class, 'setLanguage'])
    ->name('setLanguage')
    ->where('language', 'en|es|fr|it|pt|de|cn');

