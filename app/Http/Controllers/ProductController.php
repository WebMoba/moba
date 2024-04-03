<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use App\Models\Unit;
use App\Models\CategoriesProductsService;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
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
            $products = Product::where('name', 'like', '%' . $search . '%')->with('unit', 'categoriesProductsService')
                ->paginate();
        } else {
            $products = Product::with('unit', 'categoriesProductsService')->paginate();
        }

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_products_service = CategoriesProductsService::where('type', 'producto')->pluck('name', 'id');

        if (empty($categories_products_service)) {
            return redirect()->back()->with('danger', 'No hay categorías de producto disponibles.');
        }

        $product = new Product();
        $units = Unit::pluck('unit_type', 'id');

        return view('product.create', compact('product', 'units', 'categories_products_service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessages = ['required' => 'El campo es obligatorio.'];

        $request->validate(Product::$rules, $customMessages);

        // Obtener el ID de la unidad desde la solicitud
        $units_id = $request->input('units_id');

        // Crear el producto utilizando el ID de la unidad extraído
        $product = Product::create(array_merge($request->all(), [
            'units_id' => $units_id,
            'image' => $request->file('image')->store('uploads', 'public')
        ]));

        return redirect()->route('product.index')
            ->with('success', 'Producto Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $units = Unit::pluck('unit_type', 'id');
        $categories_products_service = CategoriesProductsService::pluck('name', 'id');
        return view('product.edit', compact('product', 'units', 'categories_products_service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($product->detailQuotes()->exists() || $product->detailSales()->exists()) {
            // Show alert if the product is in use
            return redirect()->back()->with('danger', 'Este producto está asociado a una cotización, venta o materia prima.');
        }
    
        $customMessages = ['required' => 'El campo es obligatorio.'];

        $request->validate(Product::$rules, $customMessages);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Guardar la nueva imagen y eliminar la antigua
            Storage::disk('public')->delete($product->image);
            $product->image = $request->file('image')->store('uploads', 'public');
        }

        $product->update($request->except('image'));

        return redirect()->route('product.index')
            ->with('success', 'Producto Editado Exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->detailQuotes()->exists() || $product->detailSales()->exists()) {
            return redirect()->route('product.index')->with('danger', 'Este producto está asociado a una cotización, venta o materia prima.');
        }

        Storage::disk('public')->delete($product->image);
        
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Producto Borrado Exitosamente.');
    }

    public function generatePDF(Request $request)
    {
        // Obtener el filtro de la solicitud
        $filter = $request->input('findId');

        // Obtener los datos de las personas filtradas si se aplicó un filtro
        if ($filter) {
            $products = Product::where('name', $filter)->get();
        } else {
            // Si no hay filtro, obtener todas las personas
            $products = Product::all();
        }
        // Pasar los datos a la vista pdf-template
        $data = [
            'products' => $products
        ];

        // Generar el PDF
        $pdf = new Dompdf();
        $pdf->loadHtml(view('product.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Productos.pdf');
    }
}
