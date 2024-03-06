<?php

namespace App\Http\Controllers;

use App\Models\DetailPurchase;
use App\Models\MaterialsRaw;
use App\Models\Purchase;
use Illuminate\Http\Request;

/**
 * Class DetailPurchaseController
 * @package App\Http\Controllers
 */
class DetailPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailPurchases = DetailPurchase::paginate();

        return view('detail-purchase.index', compact('detailPurchases'))
            ->with('i', (request()->input('page', 1) - 1) * $detailPurchases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailPurchase = new DetailPurchase();
        $purchases = Purchase::pluck('name', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');
        return view('detail-purchase.create', compact('detailPurchase', 'purchases', 'materialsRaws'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetailPurchase::$rules);

        $detailPurchase = DetailPurchase::create($request->all());

        return redirect()->route('detail_purchases.index')
            ->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailPurchase = DetailPurchase::find($id);

        return view('detail-purchase.show', compact('detailPurchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailPurchase = DetailPurchase::find($id);
        $purchases = Purchase::pluck('name', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');
        return view('detail-purchase.edit', compact('detailPurchase', 'purchases', 'materialsRaws'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetailPurchase $detailPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailPurchase $detailPurchase)
    {
        request()->validate(DetailPurchase::$rules);

        $detailPurchase->update($request->all());

        return redirect()->route('detail_purchases.index')
            ->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detailPurchase = DetailPurchase::find($id)->delete();

        return redirect()->route('detail_purchases.index')
            ->with('success', 'Registro eliminado exitosamente');
    }
}
