<?php

use App\Http\Controllers\AssurerController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoogleSearchController;
use App\Http\Controllers\MembreFamilleController;
use App\Http\Controllers\RemboursementController;
use App\Models\remboursement;

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
    return view('front.home');
});
Route::get('/acceuil', function () {
    return view('front/home');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/annuaire', function () {
        return view('annuaire');
    });

    Route::get('/listeAssurés', [AssurerController::class, 'showPatients']);
    Route::get('/ajout_membre', [MembreFamilleController::class, 'ajout_membre_view']);
    Route::post('/ajout_membre', [MembreFamilleController::class, 'ajout_membre']);

    Route::post('csv-add', [AssurerController::class, 'importPatients']);
    Route::post('changepassword', [AssurerController::class, 'changepassword']);
    Route::get('/search', [GoogleSearchController::class, 'search']);

});
Auth::routes();
Route::get('/ajout_remboursement', [RemboursementController::class, 'ajout_remboursement_view']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

