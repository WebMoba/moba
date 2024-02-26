<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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

Route::resource('projects', App\Http\Controllers\ProjectController::class)->middleware('auth');
Route::resource('team-works', App\Http\Controllers\TeamWorkController::class)->middleware('auth');
Route::resource('quotes', App\Http\Controllers\QuoteController::class)->middleware('auth');
Route::resource('detail-quotes', App\Http\Controllers\DetailQuoteController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\ProjectController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/',[App\Http\Controllers\ProjectController::class, 'index'])->name('home');  //listado de proyectos
});
Auth::routes(['register'=>false, 'reset'=>false]);