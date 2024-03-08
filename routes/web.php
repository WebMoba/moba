<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\NumberPhoneController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('events', EventController::class);
Route::resource('person', PersonController::class);
Route::resource('number-phone', NumberPhoneController::class);

Route::get('/buscar', [BusquedaController::class, 'buscar'])->name('buscar');
Route::get('/buscarPeople', [BusquedaController::class, 'buscarPeople'])->name('buscarPeople');
Route::get('/buscarCel', [BusquedaController::class, 'buscarCel'])->name('buscarCel');
Route::get('/pdf/person', [PersonController::class, 'generatePDF'])->name('pdf.person');
Route::get('/pdf/event', [EventController::class, 'generatePDF'])->name('pdf.event');
Route::get('get-towns-by-region', [PersonController::class, 'getTownsByRegion'])->name('get_towns_by_region');



require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
