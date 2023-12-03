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
//plan the routes better


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/login', [RegisterController::class, 'index'])->name('login');

Route::get('/lang/{language}', [LanguageController::class, 'setLanguage'])
    ->name('setLanguage')
    ->where('language', 'en|es|fr|it|pt|de|cn');


Route::get('/account', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/routine', [\App\Http\Controllers\RoutineController::class, 'index'])->name('routine');
Route::post('/routine', [\App\Http\Controllers\RoutineController::class, 'insert'])->name('routine');
Route::get('/routine/workout', [\App\Http\Controllers\WorkoutController::class, 'index'])->name('workout');
Route::post('/routine/workout', [\App\Http\Controllers\WorkoutController::class, 'insert'])->name('add_workout');
Route::get('/routine/workout/add',[\App\Http\Controllers\RoutineController::class, 'add_workout'])->name('add_workout');
Route::get('/routine/workout/{id}', [\App\Http\Controllers\WorkoutController::class, 'insert'])->name('workout.show');
Route::get('/routine/workout/{id}/add_exercise', [\App\Http\Controllers\ExerciseController::class, 'insert'])->name('workout.insert');
Route::post('/routine/workout/remove_exercise', [\App\Http\Controllers\ExerciseController::class, 'delete'])->name('exercise.delete');
Route::get('/routine/workout/{id}/remove_exercise', [\App\Http\Controllers\ExerciseController::class, 'render_delete'])->name('workout.render.delete');
Route::post('/routine/workout/{id}/add_exercise', [\App\Http\Controllers\ExerciseController::class, 'insert_exercise'])->name('workout.insert.exercise');
Route::get('/routine/edit', [\App\Http\Controllers\UpdateController::class, 'index'])->name('edit');
Route::post('/routine/edit', [\App\Http\Controllers\UpdateController::class, 'insert'])->name('edit');

Auth::routes();

