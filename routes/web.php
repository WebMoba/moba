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
    /*Controladores tablas Eventos, People, Buscar */

    Route::resource('events', EventController::class);
    Route::resource('person', PersonController::class);
    Route::resource('number-phone', NumberPhoneController::class);
    Route::resource('person', PersonController::class);
    Route::get('/buscar', [BusquedaController::class, 'buscar'])->name('buscar');
    Route::get('/buscarPeople', [BusquedaController::class, 'buscarPeople'])->name('buscarPeople');
    Route::get('/buscarCel', [BusquedaController::class, 'buscarCel'])->name('buscarCel');
    Route::get('/pdf/person', [PersonController::class, 'generatePDF'])->name('pdf.person');
    Route::get('/pdf/event', [EventController::class, 'generatePDF'])->name('pdf.event');
    Route::get('get-towns-by-region', [PersonController::class, 'getTownsByRegion'])->name('get_towns_by_region');

    Route::resource('materials_raws', App\Http\Controllers\MaterialsRawController::class);
    Route::resource('units', App\Http\Controllers\UnitController::class);
    Route::get('/pdf/materials_raw', [App\Http\Controllers\MaterialsRawController::class, 'generatePDF'])->name('pdf.materials_raw');
    Route::group(['prefix' => 'purchasesD'], function () {
        Route::resource('purchases', App\Http\Controllers\PurchaseController::class);
        Route::resource('detail_purchases', App\Http\Controllers\DetailPurchaseController::class);
        Route::get('/pdf/purchase', [App\Http\Controllers\PurchaseController::class, 'generatePDF'])->name('pdf.purchase');
    });

    /* fin tablas  Eventos, Buscar, People */
});

require __DIR__ . '/auth.php';

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
