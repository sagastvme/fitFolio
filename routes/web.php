<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\LanguageController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');




Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/login', [RegisterController::class, 'index'])->name('login');

Route::get('/lang/{language}', [LanguageController::class, 'setLanguage'])
    ->name('setLanguage')
    ->where('language', 'en|es|fr|it|pt|de|cn');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
