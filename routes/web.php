<?php

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\UserController;
use App\Models\Demande;
use App\Models\User;
use Illuminate\Support\Carbon;
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
Route::resource('user', UserController::class);
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

//USER Routes IL Y'EN A QUE 2
Route::get('/profile',function(){
    return view('user.profile');
})->middleware('auth')->name('user.profile');

Route::get('/rejeter/{demande}/motif',[DemandeController::class,'form_rejet'])->name('motif_rejet');
//
//
Route::get('/wait', [DemandeController::class,'en_attente'])->name('en_attente')->middleware('auth');

Route::get('/loading', [DemandeController::class,'en_cours'])->name('en_cours')->middleware('auth');

Route::get('/ended', [DemandeController::class,'traitees'])->name('traitees')->middleware('auth');

Route::get('/failed', [DemandeController::class,'rejetees'])->name('rejetees')->middleware('auth');


Route::get('/demande_du_mois',[DemandeController::class,'demande_du_mois'])->name('demande_du_mois')->middleware('auth');

Route::get('/assistancia_dashboard',[DemandeController::class,'index'])->middleware('auth','isassist')->name('assistancia_dash');

Route::get('/traitées',function(){
    $demandes=Demande::where('statut','traitée')->whereMonth('created_at',Carbon::today()->month)->get();
    $taille_traité=Demande::where('statut','traitée')->get()->count();
    return view('assistancia_user.traitees',compact('demandes','taille_traité'));

})->middleware('auth','isassist')->name('assistancia_traitées');

Route::get('/def_admin',function(){
$us=User::where('role','0')->get();

return view('assistancia_user.def_admin',compact('us'));
})->name('defar_admin');
