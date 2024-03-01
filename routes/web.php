<?php

use App\Http\Controllers\AssurerController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/acceuil', function () {
    return view('front/home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('profile');
});


Route::get('/listeAssurés', [AssurerController::class, 'showPatients']);
Route::post('csv-add', [AssurerController::class, 'importPatients']);
Route::post('changepassword', [AssurerController::class, 'changepassword']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
