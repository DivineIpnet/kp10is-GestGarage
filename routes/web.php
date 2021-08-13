<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\TypeVoitureController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;


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

Route::get('/', [VoitureController::class, 'home'])->name('voiture.home');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');

Route::get('/voiture/create', function(){
    return view('voiture.create');
})->middleware('auth');


Route::get('/list', function () {
    return view('voiture.index');
});

Route::resource('voiture', VoitureController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('voiture.home');
})->name('dashboard');

Route::resource('marque', MarqueController::class);

Route::resource('proprietaire', ProprietaireController::class);

Route::resource('users', UserController::class);

Route::resource('typevoiture', TypeVoitureController::class);

Route::resource('piece', PieceController::class);

Route::resource('modele', ModeleController::class);

Route::get('/user', function() {
    return view('user.create');
})->name('adduser');



/*
Route::get('/admin', function() {
    return view('admin.home');
})->name('admin');
 */


Route::get('/admin', [ChartController::class, 'bar'])->name('admin');
