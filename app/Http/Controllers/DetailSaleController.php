<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $detailSale = DetailSale::paginate();

        return view('detail-sale.index', compact('detailSale'))
            ->with('i', (request()->input('page', 1) - 1) * $detailSale->perPage());
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

        $detailSale = DetailSale::create([
            'products_id' => $request->product_id,
        ]);

        return redirect()->route('detail-sale.index')
            ->with('success', 'DetailSale created successfully.');
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
