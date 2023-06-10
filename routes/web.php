<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardnumberController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\VivoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CardholderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VivorecordController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',  [DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Cardnumber
Route::resource('cardnumber', CardnumberController::class)->middleware('auth');

Route::resource('client', ClientsController::class)->middleware('auth');

Route::resource('project', ProjectController::class)->middleware('auth');

Route::resource('cardholder', CardholderController::class)->middleware('auth');


Route::resource('product', ProductController::class)->middleware('auth');


Route::resource('vivo', VivoController::class)->middleware('auth');
Route::get('quantityavailable/{id}', [VivoController::class, 'quantity'])->middleware('auth');
Route::put('useunits/{id}', [VivoController::class, 'useunits'])->middleware('auth');



Route::resource('vivorecord', VivorecordController::class)->middleware('auth');

Route::get('filter/{id}', [VivorecordController::class, 'filter'])->name('filter');

Route::resource('registration', RegistrationController::class)->middleware('auth');

require __DIR__.'/auth.php';
