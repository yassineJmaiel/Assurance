<?php

use App\Http\Controllers\AssurerController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ContactController;
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
Route::get('/chatbot', function () {
    return view('bot');
});
Route::get('/acceuil', function () {
    return view('front/home');
});
Route::get('/contact', function () {
    return view('front.contactfront');
});
Route::post('addcontact', [ContactController::class, 'addContact']);


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
    Route::get('/contacts', [ContactController::class, 'list']);
    Route::get('/detailscontact/{id}', [ContactController::class, 'details']);
    Route::get('/deletecontact/{id}', [ContactController::class, 'delete']);



    
});
Auth::routes();
Route::get('/ajout_remboursement', [RemboursementController::class, 'ajout_remboursement_view']);
Route::post('/add_remboursement', [RemboursementController::class, 'store']);
Route::get('/list_remboursements', [RemboursementController::class, 'liste']);
Route::get('/list_remboursements_assureur', [RemboursementController::class, 'liste_assureur']);


Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

