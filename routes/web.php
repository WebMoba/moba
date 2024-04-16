<?php

/*controlador para envio de correo electronico*/

use App\Exports\CategoriesExport;
use App\Http\Controllers\ContactoController;

use App\Http\Controllers\PersonController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\NumberPhoneController;
use App\Http\Controllers\ProfileController;
use App\Exports\PeopleExport;
use App\Exports\EventsExport;

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
use App\Models\Product;
use App\Exports\ProjectExport;
use App\Exports\QuoteExport;
use App\Exports\TeamWorkExport;
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

Route::resources([
    'product'   => ProductController::class,
    'detail-sale' => DetailSaleController::class,
    'quotes'    => QuoteController::class,
    'sale'      => SaleController::class
]);

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
    Route::get('/export-person', [PersonController::class, 'export'])->name('excel.person');
    Route::get('/export-events', [EventController::class, 'export'])->name('excel.events');

    /*Rutas product y unit*/
    Route::resource('product', ProductController::class);
    Route::resource('unit', UnitController::class);
    Route::get('/pdf/product', [ProductController::class, 'generatePDF'])->name('pdf.product');
    Route::get('/pdf/unit', [UnitController::class, 'generatePDF'])->name('pdf.unit');
    Route::get('/export-product', [ProductController::class, 'export'])->name('excel.product');
    /*Fin Rutas product y uni*/

    /*Rutas categories_products_services y services*/
    Route::resource('service', ServiceController::class);
    Route::resource('categories-products-service', CategoriesProductsServiceController::class);
    Route::get('/pdf/service', [ServiceController::class, 'generatePDF'])->name('pdf.service');
    Route::get('/pdf/categories-products-service', [CategoriesProductsServiceController::class, 'generatePDF'])->name('pdf.categories-products-service');
    Route::get('/export-categories-products-service', [CategoriesProductsServiceController::class, 'export'])->name('excel.categories-products-service');
    Route::get('/export-service', [ServiceController::class, 'export'])->name('excel.service');
    /*Fin Rutas categories_products_services y services*/

    /*Incio Rutas purchases, detailPurchases, y materialsRaws*/
    Route::resource('materials_raws', App\Http\Controllers\MaterialsRawController::class);
    Route::resource('units', App\Http\Controllers\UnitController::class);
    Route::get('/pdf/materials_raw', [App\Http\Controllers\MaterialsRawController::class, 'generatePDF'])->name('pdf.materials_raw');
    Route::group(['prefix' => 'purchasesD'], function () {
        Route::resource('purchases', App\Http\Controllers\PurchaseController::class);
        Route::resource('detail_purchases', App\Http\Controllers\DetailPurchaseController::class);
        Route::get('/pdf/purchase', [App\Http\Controllers\PurchaseController::class, 'generatePDF'])->name('pdf.purchase');
    });
    /*Fin Rutas purchases, detailPurchases, y materialsRaws*/

    /** Inicio de Controladores Sale y DetailSale */
    Route::resource('sales', SaleController::class)->middleware('auth');
    Route::resource('detail-sale', DetailSaleController::class)->middleware('auth');
    /** fin de Controladores Sale y DetailSale  */

    //projects,teamwork y quote - fabian
    Route::resource('projects', ProjectController::class)->middleware('auth');
    Route::resource('team-works', TeamWorkController::class)->middleware('auth');
    Route::resource('quotes', QuoteController::class)->middleware('auth');
    Route::get('/pdf/project', [ProjectController::class, 'generatePDF'])->name('pdf.project');
    Route::get('/pdf/teamwork', [TeamWorkController::class, 'generatePDF'])->name('pdf.teamwork');
    Route::get('/pdf/quote', [QuoteController::class, 'generatePDF'])->name('pdf.quote');
    Route::get('/export-project', [ProjectController::class, 'export'])->name('excel.project');
    Route::get('/export-quote', [QuoteController::class, 'export'])->name('excel.quote');
    Route::get('/export-teamwork', [TeamWorkController::class, 'export'])->name('excel.teamwork');
    //fin-fabian

    //Vistas carpeta servicios
    Route::get('/mobaMenu/index', function () {
        return view('mobaMenu.index');
    });
    Route::view('/mobaMenu/Servicios/servicios', 'mobaMenu.servicios.servicios')->name('mobaMenu.Servicios.servicios');
    //Fin vistas carpeta servicios


    //Vistas fronted Moba
    Route::view('/mobaMenu/index', 'mobaMenu.index')->name('mobaMenu.index');
    Route::view('/mobaMenu/EquipoTrabajo/index', 'mobaMenu.EquipoTrabajo.index')->name('mobaMenu.EquipoTrabajo.index');
    Route::view('/mobaMenu/Contacto/index', 'mobaMenu.Contacto.index')->name('mobaMenu.Contacto.index');
    


    //vistas froted tu arte 
    Route::view('/tuArteMenu/index', 'tuArteMenu.index')->name('tuArteMenu.index');
    Route::view('/tuArteMenu/galeria/index', 'tuArteMenu.galeria.index')->name('tuArteMenu.galeria.index');
    Route::view('/tuArteMenu/categorias/index', 'tuArteMenu.categorias.index')->name('tuArteMenu.categorias.index');
    Route::view('/tuArteMenu/servicios/index', 'tuArteMenu.servicios.index')->name('tuArteMenu.servicios.index');
    Route::view('/tuArteMenu/servicios/Acccesorios/index', 'tuArteMenu.servicios.Accesorios.index')->name('tuArteMenu.servicios.Accesorios.index');
    Route::view('/tuArteMenu/Contacto/index', 'tuArteMenu.Contacto.index')->name('tuArteMenu.Contacto.index');




    //ruta Correo electronico
    Route::post('/enviar-correo', [ContactoController::class, 'enviarCorreo'])->name('enviar-correo');
});




require __DIR__ . '/auth.php';

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
