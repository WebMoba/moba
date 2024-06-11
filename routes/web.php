 <?php

    use App\Http\Controllers\DashboardController;
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
    use App\Models\MaterialsRaw;
    use App\Models\Purchase;
    use App\Models\Quote;
    use App\Models\Sale;
    use App\Models\Service;
    use App\Models\TeamWork;

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


    //dashboard

    Route::middleware(['auth', 'admin.email', 'check.disabled'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard')->middleware('auth');

        Route::get('/pages/dashboard', [QuoteController::class, 'QuotesData'])->name('pages.dashboard');
        Route::resource('product', ProductController::class);
        Route::resource('unit', UnitController::class);
        Route::get('/pdf/product', [ProductController::class, 'generatePDF'])->name('pdf.product');
        Route::get('/pdf/unit', [UnitController::class, 'generatePDF'])->name('pdf.unit');

        // Otras rutas protegidas para administradores...

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
            Route::get('/pdf/purchase-detail', [PurchaseController::class, 'generateDetailPDF'])->name('pdf.purchase-detail');
            Route::get('/export/excel', [PurchaseController::class, 'exportToExcel'])->name('excel.purchase');
            Route::get('/export/materials-raw', [MaterialsRawController::class, 'exportToExcel'])->name('export.materials.raw');
        });
        /*Fin Rutas purchases, detailPurchases, y materialsRaws*/
        /** Inicio de Controladores Sale y DetailSale */
        Route::resource('sales', SaleController::class)->middleware('auth');
        Route::get('/pdf/sales', [SaleController::class, 'generatePDF'])->name('pdf.sales');
        Route::get('/pdf/sale-detail', [SaleController::class, 'generateDetailPDF'])->name('pdf.sale-detail');
        Route::resource('detail-sale', DetailSaleController::class)->middleware('auth');
        Route::get('/export/sales', [SaleController::class, 'exportToExcel'])->name('export.sales');
        /** fin de Controladores Sale y DetailSale  */

        //projects,teamwork y quote - fabian
        Route::resource('projects', ProjectController::class)->middleware('auth');
        Route::resource('team-works', TeamWorkController::class)->middleware('auth');
        Route::resource('quotes', QuoteController::class)->middleware('auth');
        Route::get('/pdf/project', [ProjectController::class, 'generatePDF'])->name('pdf.project');
        Route::get('/pdf/teamwork', [TeamWorkController::class, 'generatePDF'])->name('pdf.teamwork');
        Route::get('/pdf/quote-detail', [QuoteController::class, 'generateDetailPDF'])->name('pdf.quote-detail');
        Route::get('/pdf/quote', [QuoteController::class, 'generatePDF'])->name('pdf.quote');
        Route::get('/export-project', [ProjectController::class, 'export'])->name('excel.project');
        Route::get('/export-quote', [QuoteController::class, 'export'])->name('excel.quote');
        Route::get('/export-teamwork', [TeamWorkController::class, 'export'])->name('excel.teamwork');
        //fin-fabian

        //ruta pdf manual administrativo
        Route::get('/ver-pdf', function () {
            $filePath = public_path('documentos/ManualAdministrativo.pdf');
            return response()->file($filePath);
        });
    });

    //rutas nuevas pdf
    Route::get('Person/pdf', [PersonController::class, 'pdf'])->name('person.pdf');
    Route::get('Event/pdf', [EventController::class, 'pdf'])->name('event.pdf');
    Route::get('Purchase/pdf', [PurchaseController::class, 'pdf'])->name('purchase.pdf');
    Route::get('Materials-raw/pdf', [MaterialsRawController::class, 'pdf'])->name('materialsraw.pdf');
    Route::get('Sale/pdf', [SaleController::class, 'pdf'])->name('sale.pdf');
    Route::get('Product/pdf', [ProductController::class, 'pdf'])->name('product.pdf');
    Route::get('Categories/pdf', [CategoriesProductsServiceController::class, 'pdf'])->name('categories.pdf');
    Route::get('Service/pdf', [ServiceController::class, 'pdf'])->name('service.pdf');
    Route::get('Project/pdf', [ProjectController::class, 'pdf'])->name('project.pdf');
    Route::get('Team-work/pdf', [TeamWorkController::class, 'pdf'])->name('teamwork.pdf');
    Route::get('Quote/pdf', [QuoteController::class, 'pdf'])->name('quote.pdf');
    //rutas detalle pdf
    Route::get('Purchase-Detail/pdf/{id}', [PurchaseController::class, 'detailPdf'])->name('purchaseDetail.pdf');
    Route::get('Sale-Detail/pdf/{id}', [SaleController::class, 'detailPdf'])->name('saleDetail.pdf');
    Route::get('quote-detail/pdf/{id}', [QuoteController::class, 'detailPdf'])->name('quoteDetail.pdf');



    //Vistas carpeta servicios
    Route::get('/mobaMenu/index', function () {
        return view('mobaMenu.index');
    });
    Route::view('/mobaMenu/Servicios/servicios', 'mobaMenu.servicios.servicios')->name('mobaMenu.Servicios.servicios');
    //Fin vistas carpeta servicios

    //vistas de proyectos
    Route::get('/mobaMenu/proyectos/index', [ProjectController::class, 'PrincipalProjectos'])->name('mobaMenu.proyectos.index');
    Route::get('/mobaMenu/proyectos/Muestra{id}', [ProjectController::class, 'Projectosides'])->name('mobaMenu.proyectos.Muestra');

    //Vistas fronted Moba
    Route::view('/mobaMenu/index', 'mobaMenu.index')->name('mobaMenu.index');
    Route::get('/mobaMenu/index', [ProjectController::class, 'showIndex'])->name('mobaMenu.index');
    Route::view('/mobaMenu/EquipoTrabajo/index', 'mobaMenu.EquipoTrabajo.index')->name('mobaMenu.EquipoTrabajo.index');
    Route::view('/mobaMenu/EquipoTrabajo/integranteUno', 'mobaMenu.EquipoTrabajo.integranteUno')->name('mobaMenu.EquipoTrabajo.integranteUno');
    Route::view('/mobaMenu/EquipoTrabajo/integranteDos', 'mobaMenu.EquipoTrabajo.integranteDos')->name('mobaMenu.EquipoTrabajo.integranteDos');
    Route::view('/mobaMenu/EquipoTrabajo/integranteTres', 'mobaMenu.EquipoTrabajo.integranteTres')->name('mobaMenu.EquipoTrabajo.integranteTres');
    Route::view('/mobaMenu/EquipoTrabajo/integranteCuatro', 'mobaMenu.EquipoTrabajo.integranteCuatro')->name('mobaMenu.EquipoTrabajo.integranteCuatro');
    Route::view('/mobaMenu/Contacto/index', 'mobaMenu.Contacto.index')->name('mobaMenu.Contacto.index');

    //vistas froted tu arte 
    Route::view('/tuArteMenu/index', 'tuArteMenu.index')->name('tuArteMenu.index');
    Route::view('/tuArteMenu/galeria/index', 'tuArteMenu.galeria.index')->name('tuArteMenu.galeria.index');
    Route::view('/tuArteMenu/categorias/index', 'tuArteMenu.categorias.index')->name('tuArteMenu.categorias.index');
    Route::view('/tuArteMenu/servicios/index', 'tuArteMenu.servicios.index')->name('tuArteMenu.servicios.index');
    Route::get('/tuArteMenu/servicios/Accesorios/index', [ProductController::class, 'indexForAccessories'])->name('tuArteMenu.servicios.Accesorios.index');
    Route::get('/tuArteMenu/servicios/Decoracion/index', [ProductController::class, 'indexForDecoration'])->name('tuArteMenu.servicios.Decoracion.index');
    Route::get('/tuArteMenu/servicios/JoditasPalRecuerdo/index', [ProductController::class, 'indexForJoditas'])->name('tuArteMenu.servicios.JoditasPalRecuerdo.index');
    Route::get('/mobaMenu/EquipoTrabajo/index', [TeamWorkController::class, 'equipo'])->name('mobaMenu.EquipoTrabajo.index');
    Route::get('/tuArteMenu/servicios/Mascotas/index', [ProductController::class, 'indexForPets'])->name('tuArteMenu.servicios.Mascotas.index');
    Route::view('/tuArteMenu/Contacto/index', 'tuArteMenu.Contacto.index')->name('tuArteMenu.Contacto.index');

    //ruta Correo electronico
    Route::post('/enviar-correo', [ContactoController::class, 'enviarCorreo'])->name('enviar-correo');
    Route::post('/contacto', [ContactoController::class, 'enviarMensaje'])->name('enviar-mensaje');

    //Breadcrumds
    Route::get('quotes/show/{quote}', [QuoteController::class, 'show'])->name('quote.show');
    Route::get('person/show/{person}', [PersonController::class, 'show'])->name('person.show');
    Route::get('person/edit/{person}', [PersonController::class, 'edit'])->name('person.edit');
    Route::get('event/show/{event}', [EventController::class, 'show'])->name('event.show');
    Route::get('event/edit/{event}', [EventController::class, 'edit'])->name('event.edit');
    Route::get('materials_raws/materialsRaw/{event}', [MaterialsRawController::class, 'show'])->name('materials-raw.show');
    Route::get('materials_raws/materialsRaw/{event}', [MaterialsRawController::class, 'edit'])->name('materials-raw.edit');
    Route::get('purchases/show/{purchases}', [PurchaseController::class, 'show'])->name('purchase.show');
    Route::get('sale/show/{sale}', [SaleController::class, 'show'])->name('sale.show');
    Route::get('product/show/{products}', [ProductController::class, 'show'])->name('products.show');
    Route::get('product/edit/{products}', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('categories-products-service/show/{categoriesProductsService}', [CategoriesProductsServiceController::class, 'show'])->name('categories-products-service.show');
    Route::get('categories-products-service/edit/{categoriesProductsService}', [CategoriesProductsServiceController::class, 'edit'])->name('categories-products-service.edit');
    Route::get('service/show/{service}', [ServiceController::class, 'show'])->name('service.show');
    Route::get('service/edit/{service}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::get('project/show/{project}', [ProjectController::class, 'edit'])->name('project.show');
    Route::get('project/edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::get('team-works/show/{teamWork}', [TeamWorkController::class, 'show'])->name('team-work.show');
    Route::get('team-works/edit/{teamWork}', [TeamWorkController::class, 'edit'])->name('team-work.edit');

    //ruta nombre categorias 

    Route::get('/tuArteMenu/categorias', function () {
        $categorias = CategoriesProductsService::where('disable', false)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('tuArteMenu.categorias.index', compact('categorias'));
    })->name('tuArteMenu.categorias.index');
    require __DIR__ . '/auth.php';


    Auth::routes();

    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\PageController;
    use App\Http\Controllers\RegisterController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\UserProfileController;
    use App\Http\Controllers\ResetPassword;
    use App\Http\Controllers\ChangePassword;

    Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
    Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
    Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
    Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
    Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
    Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

    /* Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');*/
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
        Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
        Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
        Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
        Route::get('/{page}', [PageController::class, 'index'])->name('page');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');


        // ruta manual Usuario 

        Route::get('/ver-pdf', function () {
            $filePath = public_path('documentos/ManualUsuario.pdf');
            return response()->file($filePath);
        });
    });
