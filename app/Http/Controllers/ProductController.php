<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use App\Models\Unit;
use App\Models\CategoriesProductsService;
use App\Models\Product;
use App\Models\Quote;
use App\Models\User;
use App\Models\Person;
use App\Models\Sale;
use App\Models\DetailSale;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
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
                ->paginate(10);
        } else {
            $products = Product::with('unit', 'categoriesProductsService')->paginate(10);
        }

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function indexForAccessories()
    {
        $search = request()->input('search');

        // Filtra los productos por la categoría "Accesorios"
        $products = Product::whereHas('categoriesProductsService', function ($query) {
            $query->where('name', 'Accesorios');
        })
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->with('unit', 'categoriesProductsService')
            ->paginate();

        return view('tuArteMenu.servicios.Accesorios.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function indexForDecoration()
    {
        $search = request()->input('search');

        // Filtra los productos por la categoría "Decoracion"
        $products = Product::whereHas('categoriesProductsService', function ($query) {
            $query->where('name', 'Decoracion');
        })
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->with('unit', 'categoriesProductsService')
            ->paginate();

        return view('tuArteMenu.servicios.Decoracion.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function indexForJoditas()
    {
        $search = request()->input('search');

        // Filtra los productos por la categoría "Decoracion"
        $products = Product::whereHas('categoriesProductsService', function ($query) {
            $query->where('name', 'Joditas pal Recuerdo');
        })
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->with('unit', 'categoriesProductsService')
            ->paginate();

        return view('tuArteMenu.servicios.JoditasPalRecuerdo.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function indexForPets()
    {
        $search = request()->input('search');

        // Filtra los productos por la categoría "Decoracion"
        $products = Product::whereHas('categoriesProductsService', function ($query) {
            $query->where('name', 'Mascotas');
        })
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->with('unit', 'categoriesProductsService')
            ->paginate();

        return view('tuArteMenu.servicios.Mascotas.index', compact('products'))
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

        $product = new Product();
        $units = Unit::pluck('unit_type', 'id');
        $editing = false;


        return view('product.create', compact('product', 'editing', 'units', 'categories_products_service'));
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
            'image' => $request->file('image')->store('uploads', 'public'),
            'disable' => 0,
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
        $editing = true;

        return view('product.edit', compact('product', 'editing', 'units', 'categories_products_service'));
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

        // Cambiar el estado disable del producto
        $product->disable = !$product->disable; // Cambiar el estado al contrario del estado actual
        $product->save();

        //Storage::disk('public')->delete($product->image);

        return redirect()->route('product.index')
            ->with('success', 'Estado del producto cambiado con éxito.');
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

    public function export()
    {
        return Excel::download(new ProductExport, 'productos.xlsx');
    }
}
