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
use App\Models\CategoriesProductsService;
//controladores project,teamwork y quote/fabian
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\TeamWorkController;
use App\Models\Product;
use App\Exports\ProjectExport;
use App\Exports\QuoteExport;
use App\Exports\TeamWorkExport;
//fin fabian

//controladores purchases, detailpurchases y materials raw

use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\MaterialsRawController;

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
})->name('welcome');


Route::resource('product', ProductController::class);
Route::resource('unit', UnitController::class);

Route::get('/pdf/product', [ProductController::class, 'generatePDF'])->name('pdf.product');
Route::get('/pdf/unit', [UnitController::class, 'generatePDF'])->name('pdf.unit');

//dashboard

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/pages/dashboard', [QuoteController::class, 'QuotesData'])->name('pages.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*Controladores tablas Eventos, People, Buscar */
    Route::resource('events', EventController::class);
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
        Route::get('/export/excel', [PurchaseController::class, 'exportToExcel'])->name('excel.purchase');
        Route::get('/export/materials-raw', [MaterialsRawController::class, 'exportToExcel'])->name('export.materials.raw');
    });
    /*Fin Rutas purchases, detailPurchases, y materialsRaws*/

    /** Inicio de Controladores Sale y DetailSale */
    Route::resource('sales', SaleController::class)->middleware('auth');
    Route::get('/pdf/sales', [SaleController::class, 'generatePDF'])->name('pdf.sales');
    Route::resource('detail-sale', DetailSaleController::class)->middleware('auth');
    Route::get('/export/sales', [SaleController::class, 'exportToExcel'])->name('export.sales');
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




});

//Vistas carpeta servicios
Route::get('/mobaMenu/index', function () {
    return view('mobaMenu.index');
});
Route::view('/mobaMenu/Servicios/servicios', 'mobaMenu.servicios.servicios')->name('mobaMenu.Servicios.servicios');
//Fin vistas carpeta servicios


//vistas de proyectos
Route::view('/mobaMenu/proyectos/PARAISO', 'mobaMenu.proyectos.PARAISO')->name('mobaMenu.proyectos.PARAISO');
Route::view('/mobaMenu/proyectos/JAATELO', 'mobaMenu.proyectos.JAATELO')->name('mobaMenu.proyectos.JAATELO');
Route::view('/mobaMenu/proyectos/ACERIAS', 'mobaMenu.proyectos.ACERIAS')->name('mobaMenu.proyectos.ACERIAS');
Route::view('/mobaMenu/proyectos/BIOSALUD', 'mobaMenu.proyectos.BIOSALUD')->name('mobaMenu.proyectos.BIOSALUD');
Route::view('/mobaMenu/proyectos/HOSPITAL', 'mobaMenu.proyectos.HOSPITAL')->name('mobaMenu.proyectos.HOSPITAL');
Route::view('/mobaMenu/proyectos/DULCES', 'mobaMenu.proyectos.DULCES')->name('mobaMenu.proyectos.DULCES');
Route::view('/mobaMenu/proyectos/CABUBARA', 'mobaMenu.proyectos.CABUBARA')->name('mobaMenu.proyectos.CABUBARA');
Route::view('/mobaMenu/proyectos/ODONTOLOGA', 'mobaMenu.proyectos.ODONTOLOGA')->name('mobaMenu.proyectos.ODONTOLOGA');
Route::view('/mobaMenu/proyectos/ODONTOLOGIA', 'mobaMenu.proyectos.ODONTOLOGIA')->name('mobaMenu.proyectos.ODONTOLOGIA');
Route::view('/mobaMenu/proyectos/PUNTOCERO', 'mobaMenu.proyectos.PUNTOCERO')->name('mobaMenu.proyectos.PUNTOCERO');
Route::view('/mobaMenu/proyectos/RASPADOS', 'mobaMenu.proyectos.RASPADOS')->name('mobaMenu.proyectos.RASPADOS');
Route::view('/mobaMenu/proyectos/JOVEN', 'mobaMenu.proyectos.JOVEN')->name('mobaMenu.proyectos.JOVEN');
Route::view('/mobaMenu/proyectos/CAFELATINO', 'mobaMenu.proyectos.CAFELATINO')->name('mobaMenu.proyectos.CAFELATINO');
Route::view('/mobaMenu/proyectos/CAFEMANA', 'mobaMenu.proyectos.CAFEMANA')->name('mobaMenu.proyectos.CAFEMANA');
Route::view('/mobaMenu/proyectos/EMPANADASBOTI', 'mobaMenu.proyectos.EMPANADASBOTI')->name('mobaMenu.proyectos.EMPANADASBOTI');
Route::view('/mobaMenu/proyectos/EMPANADASRANCHO', 'mobaMenu.proyectos.EMPANADASRANCHO')->name('mobaMenu.proyectos.EMPANADASRANCHO');
Route::view('/mobaMenu/proyectos/EMPOWER', 'mobaMenu.proyectos.EMPOWER')->name('mobaMenu.proyectos.EMPOWER');
Route::view('/mobaMenu/proyectos/PALMAS', 'mobaMenu.proyectos.PALMAS')->name('mobaMenu.proyectos.PALMAS');







//Vistas fronted Moba
Route::view('/mobaMenu/index', 'mobaMenu.index')->name('mobaMenu.index');
Route::view('/mobaMenu/EquipoTrabajo/index', 'mobaMenu.EquipoTrabajo.index')->name('mobaMenu.EquipoTrabajo.index');
Route::view('/mobaMenu/EquipoTrabajo/integranteUno', 'mobaMenu.EquipoTrabajo.integranteUno')->name('mobaMenu.EquipoTrabajo.integranteUno');
Route::view('/mobaMenu/EquipoTrabajo/integranteDos', 'mobaMenu.EquipoTrabajo.integranteDos')->name('mobaMenu.EquipoTrabajo.integranteDos');
Route::view('/mobaMenu/EquipoTrabajo/integranteTres', 'mobaMenu.EquipoTrabajo.integranteTres')->name('mobaMenu.EquipoTrabajo.integranteTres');
Route::view('/mobaMenu/EquipoTrabajo/integranteCuatro', 'mobaMenu.EquipoTrabajo.integranteCuatro')->name('mobaMenu.EquipoTrabajo.integranteCuatro');
Route::view('/mobaMenu/Contacto/index', 'mobaMenu.Contacto.index')->name('mobaMenu.Contacto.index');
Route::view('/mobaMenu/proyectos/index', 'mobaMenu.proyectos.index')->name('mobaMenu.proyectos.index');




//vistas froted tu arte 
Route::view('/tuArteMenu/index', 'tuArteMenu.index')->name('tuArteMenu.index');
Route::view('/tuArteMenu/galeria/index', 'tuArteMenu.galeria.index')->name('tuArteMenu.galeria.index');
Route::view('/tuArteMenu/categorias/index', 'tuArteMenu.categorias.index')->name('tuArteMenu.categorias.index');
Route::view('/tuArteMenu/servicios/index', 'tuArteMenu.servicios.index')->name('tuArteMenu.servicios.index');
Route::get('/tuArteMenu/servicios/Accesorios/index', [ProductController::class, 'indexForAccessories'])->name('tuArteMenu.servicios.Accesorios.index');
Route::get('/tuArteMenu/servicios/Decoracion/index', [ProductController::class, 'indexForDecoration'])->name('tuArteMenu.servicios.Decoracion.index');
Route::get('/tuArteMenu/servicios/JoditasPalRecuerdo/index', [ProductController::class, 'indexForJoditas'])->name('tuArteMenu.servicios.JoditasPalRecuerdo.index');
Route::get('/tuArteMenu/servicios/Mascotas/index', [ProductController::class, 'indexForPets'])->name('tuArteMenu.servicios.Mascotas.index');
Route::view('/tuArteMenu/Contacto/index', 'tuArteMenu.Contacto.index')->name('tuArteMenu.Contacto.index');






//ruta Correo electronico
Route::post('/enviar-correo', [ContactoController::class, 'enviarCorreo'])->name('enviar-correo');
//Breadcrumds
Route::get('quotes/show/{quote}', [QuoteController::class, 'view'])->name('quote.show');
Route::get('person/show/{person}', [PersonController::class, 'view'])->name('person.show');
Route::get('person/edit/{person}', [PersonController::class, 'view'])->name('person.edit');
Route::get('event/show/{event}', [EventController::class, 'view'])->name('event.show');
Route::get('event/edit/{event}', [EventController::class, 'view'])->name('event.edit');
Route::get('purchases/show/{purchases}', [PurchaseController::class, 'view'])->name('purchase.show');


//ruta nombre categorias 

Route::get('/tuArteMenu/categorias', function () {
    $categorias = CategoriesProductsService::where('disable', false)
        ->orderBy('created_at', 'asc')
        ->get();
    return view('tuArteMenu.categorias.index', compact('categorias'));
})->name('tuArteMenu.categorias.index');
require __DIR__ . '/auth.php';

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\DashboardController;


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard')->middleware('auth');
/* Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
    Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
    Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
    Route::get('/{page}', [PageController::class, 'index'])->name('page');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
