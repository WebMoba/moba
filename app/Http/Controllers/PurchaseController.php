<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\DetailPurchase;
use App\Models\MaterialsRaw;
use App\Models\Person;
use Illuminate\Http\Request;


/**
 * Class PurchaseController
 * @package App\Http\Controllers
 */
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $purchases = Purchase::with('person')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('purchase.index', compact('purchases', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $purchases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchase = new Purchase();
        $purchase->date = now()->format('Y-m-d');
        $people = Person::pluck('id_card', 'id');
        //$detailPurchases = DetailPurchase::all();
        //$detailPurchase = DetailPurchase::pluck('quantity', 'price_unit', 'subtotal', 'discount', 'total', 'id');
        $detailP = DetailPurchase::pluck('quantity', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');
        return view('purchase.create', compact('purchase', 'people', 'detailP', 'materialsRaws'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Purchase::$rules);

        $purchase = Purchase::create($request->all());

        // Nueva instancia de DetailPurchase
        $detailPurchase = new DetailPurchase([
            'quantity' => $request->input('quantity'),
            'price_unit' => $request->input('price_unit'),
            'subtotal' => $request->input('subtotal'),
            'discount' => $request->input('discount'),
            'total' => $request->input('total'),
            'materials_raws_id' => $request->input('materials_raws_id')
        ]);

        // Asociar el DetailPurchase con el Purchase creado
        $purchase->detailPurchases()->save($detailPurchase);

        return redirect()->route('purchases.index')
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
        $purchase = Purchase::find($id);
        $people = Person::pluck('id_card', 'id');
        $detailPurchases = DetailPurchase::all();
        $materialsRaws = MaterialsRaw::pluck('name', 'id');

        return view('purchase.show', compact('purchase', 'people', 'detailPurchases', 'materialsRaws'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);
      
        $people = Person::pluck('id_card', 'id');
        //$detailPurchases = DetailPurchase::all();
        $detailP = DetailPurchase::pluck('quantity', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');
        return view('purchase.edit', compact('purchase', 'people', 'detailP', 'materialsRaws'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Purchase $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        request()->validate(Purchase::$rules);

        $purchase->update($request->all());

        return redirect()->route('purchases.index')
            ->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);

        DetailPurchase::where('purchases_id', $id)->delete();

        $purchase->delete();

        return redirect()->route('purchases.index')
            ->with('success', 'Registro eliminado exitosamente');
    }
}
