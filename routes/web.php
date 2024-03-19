<?php


use App\Http\Controllers\PersonController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\NumberPhoneController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DetailSaleController;
/*Importartación de controladores product y unit*/
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
/*Fin Importartación de controladores product y unit*/
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoriesProductsServiceController;
//controladores project,teamwork y quote/fabian
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\TeamWorkController;
//fin fabian

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

Route::resource('product', ProductController::class);
Route::resource('unit', UnitController::class);

Route::get('/pdf/product', [ProductController::class, 'generatePDF'])->name('pdf.product');
Route::get('/pdf/unit', [UnitController::class, 'generatePDF'])->name('pdf.unit');

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

    /*Rutas product y unit*/
    Route::resource('product', ProductController::class);
    Route::resource('unit', UnitController::class);
    Route::get('/pdf/product', [ProductController::class, 'generatePDF'])->name('pdf.product');
    Route::get('/pdf/unit', [UnitController::class, 'generatePDF'])->name('pdf.unit');
    /*Fin Rutas product y uni*/

    /*Rutas categories_products_services y services*/
    Route::resource('service', ServiceController::class);
    Route::resource('categories-products-service', CategoriesProductsServiceController::class);
    Route::get('/pdf/service', [ServiceController::class, 'generatePDF'])->name('pdf.service');
    Route::get('/pdf/categories-products-service', [CategoriesProductsServiceController::class, 'generatePDF'])->name('pdf.categories-products-service');
    /*Fin Rutas categories_products_services y services*/

    Route::resource('materials_raws', App\Http\Controllers\MaterialsRawController::class);
    Route::resource('units', App\Http\Controllers\UnitController::class);
    Route::get('/pdf/materials_raw', [App\Http\Controllers\MaterialsRawController::class, 'generatePDF'])->name('pdf.materials_raw');
    Route::group(['prefix' => 'purchasesD'], function () {
    Route::resource('purchases', App\Http\Controllers\PurchaseController::class);
    Route::resource('detail_purchases', App\Http\Controllers\DetailPurchaseController::class);
    Route::get('/pdf/purchase', [App\Http\Controllers\PurchaseController::class, 'generatePDF'])->name('pdf.purchase');
    });
    /* fin tablas  Eventos, Buscar, People */

    /** Inicio de Controladores Sale y DetailSale */
    Route::resource('sales', SaleController::class)->middleware('auth');
    Route::resource('detail-sale', DetailSaleController::class)->middleware('auth');
    /** fin de Controladores Sale y DetailSale  */

    //projects,teamwork y quote - fabian
    Route::resource('projects', App\Http\Controllers\ProjectController::class)->middleware('auth');
    Route::resource('team-works', App\Http\Controllers\TeamWorkController::class)->middleware('auth');
    Route::resource('quotes', App\Http\Controllers\QuoteController::class)->middleware('auth');
    Route::get('/pdf/project', [ProjectController::class, 'generatePDF'])->name('pdf.project');
    Route::get('/pdf/teamwork', [TeamWorkController::class, 'generatePDF'])->name('pdf.teamwork');
    Route::get('/pdf/quote', [QuoteController::class, 'generatePDF'])->name('pdf.quote');
    //fin-fabian
});




require __DIR__ . '/auth.php';

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
