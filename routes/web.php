<?php

use App\Http\Controllers\DemandeController;
use App\Models\Demande;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('my_home.home');
});
Route::resource('demandes',DemandeController::class)->middleware('auth');
Auth::routes();
Route::get('/dashboardadmin',[DemandeController::class,'index'])->middleware('auth','verifadmin');
Route::put('/traiter/{demande}',[DemandeController::class,'traitement'])->name('demande.traiter');
Route::put('/finaliser/{demande}',[DemandeController::class,'finaliser'])->name('demande.finaliser');
Route::put('/rejeter/{demande}',[DemandeController::class,'rejeter'])->name('demande.rejeter');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


