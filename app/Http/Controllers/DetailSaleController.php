<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Quote;
use App\Models\User;
use App\Models\Person;
use App\Models\Sale;
use App\Models\DetailSale;
use Illuminate\Http\Request;
/**
 * Class DetailSaleController
 * @package App\Http\Controllers
 */
class DetailSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailSales = DetailSale::paginate();
                   

        return view('detail-sale.index', compact('detailSales'))
            ->with('i', (request()->input('page', 1) - 1) * $detailSales->perPage());

        $product = Product::all(); // o alguna otra forma de obtener los detalles de las ventas
        
        return view('detail-sale.index', compact('name', 'id'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
    {
        $detailSale = new DetailSale();
        $products = Product::pluck('name', 'id'); // Obtener los productos

        return view('detail-sale.create', compact('detailSale', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

        public function store(Request $request)
    {
        request()->validate(DetailSale::$rules);

        $product = Product::find($request->product_id);

        $detailSale = DetailSale::create([
            'products_id' => $product->id,
            'price_unit' => $product->price,
            'products_name' => $product->name,
            // Asegúrate de agregar otros campos necesarios aquí
        ]);

        return redirect()->route('detail-sale.index')
            ->with('success', 'Detalle de venta creado exitosamente.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $detailSale = DetailSale::find($id);

        if(!$detailSale) {
            return redirect()->route('detail-sale.index')->with('error', 'DetailSale no funciona');
        }

        return view('detail-sale.show', compact('detailSale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $detailSale = DetailSale::find($id);

    if (!$detailSale) {
        return redirect()->route('detail-sale.index')->with('error', 'DetailSale no funciona');
    }

    $products = Product::pluck('name', 'id'); // Obtener los productos

    return view('detail-sale.edit', compact('detailSale', 'products'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetailSale $detailSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailSale $detailSale)
    {
        request()->validate(DetailSale::$rules);

        $detailSale->update($request->all());

        return redirect()->route('detail-sale.index')
            ->with('success', 'DetailSale updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detailSale = DetailSale::find($id)->delete();

        return redirect()->route('detail-sale.index')
            ->with('success', 'detalle de venta eliminada con exito');
    }
}
