<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoriesExport;
use App\Models\CategoriesProductsService;
use Illuminate\Http\Request;

/**
 * Class CategoriesProductsServiceController
 * @package App\Http\Controllers
 */
class CategoriesProductsServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->input('search');

        if (!empty($search)) {
            $categoriesProductsServices = CategoriesProductsService::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('type', 'like', '%' . $search . '%');
            })
                ->paginate();
        } else {
            $categoriesProductsServices = CategoriesProductsService::paginate();
        }

        return view('categories-products-service.index', compact('categoriesProductsServices'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriesProductsServices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesProductsService = new CategoriesProductsService();
        $editing = false;

        return view('categories-products-service.create', compact('categoriesProductsService', 'editing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Contar la cantidad de productos deshabilitados
    $disabledProductCount = CategoriesProductsService::where('type', 'producto')->where('disable', 1)->count();
    $maxProducts = 4;

    // Validar si se pueden crear más productos
    if ($disabledProductCount >= $maxProducts) {
        return redirect()->back()->with('error', 'No se pueden crear más categorías de productos.');
    }

    // Validación de los campos requeridos incluyendo la validación de cantidad no negativa
    $customMessages = ['required' => 'El campo es obligatorio.'];
    $request->validate(array_merge(CategoriesProductsService::$rules, [
        'quantity' => 'required|numeric|min:0'
    ]), $customMessages);

    // Crear la categoría de productos o servicios
    $categoriesProductsService = CategoriesProductsService::create(array_merge($request->all(), ['disable' => 1]));

    // Redireccionar con mensaje de éxito
    return redirect()->route('categories-products-service.index')
        ->with('success', 'Categoría creada exitosamente.');
}

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriesProductsService = CategoriesProductsService::find($id);

        return view('categories-products-service.show', compact('categoriesProductsService'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriesProductsService = CategoriesProductsService::find($id);
        $editing = true;


        return view('categories-products-service.edit', compact('categoriesProductsService', 'editing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriesProductsService $categoriesProductsService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriesProductsService $categoriesProductsService)
    {
        request()->validate(CategoriesProductsService::$rules);

        $categoriesProductsService->update($request->all());

        return redirect()->route('categories-products-service.index')
            ->with('success', 'Categoria Editada Exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    { //busca la categoria por su id
        $categoriesProductsService = CategoriesProductsService::find($id);
        //verifica si la categoria existe 
        if (!$categoriesProductsService) {
            return redirect()->route('categories-products-service.index')->with('danger', 'categoria no encontrada.');
        }
        //verifica si la categoria esta asociada a un producto o un servicio
       
        //si no esta asociada elimina la categoria 

        $categoriesProductsService->disable = !$categoriesProductsService->disable;
        $categoriesProductsService->save();

        //terona a la pagina de indice con un mensaje de exito
        return redirect()->route('categories-products-service.index')
            ->with('success', 'Categoria desabilitada exitosamente');
    }
    public function generatePDF(Request $request)
    {
        // Obtener el filtro de la solicitud
        $filter = $request->input('findId');

        // Obtener los datos de las personas filtradas si se aplicó un filtro
        if ($filter) {
            $categoriesProductsServices = CategoriesProductsService::where('name', $filter)->get();
        } else {
            // Si no hay filtro, obtener todas las personas
            $categoriesProductsServices = CategoriesProductsService::all();
        }
        // Pasar los datos a la vista pdf-template
        $data = [
            'categoriesProductsServices' => $categoriesProductsServices
        ];

        // Generar el PDF
        $pdf = new Dompdf();
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->loadHtml(view('categories-products-service.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('categorias.pdf');
    }

    public function export()
    {
        return Excel::download(new CategoriesExport, 'categorias.xlsx');
    }



    // Aca se obtienen los nombre para pásarlos a la visat tu Arete/categorias

    public function mostrarVista()
    {
        $nombreCategoria = $this->obtenerNombreCategoria();

        return view('tuArteMenu.categorias.index', compact('nombreCategoria'));
    }

    public function obtenerNombreCategoria()
    {
        // Aquí obtenemos el nombre de la categoría, por ejemplo, la primera categoría
        $categoria = CategoriesProductsService::first();

        // Verificamos si la categoría existe
        if ($categoria) {
            return $categoria->name;
        } else {
            return 'Categoría no encontrada'; // Puedes manejar el caso donde no se encuentra la categoría
        }
    }
    
}
