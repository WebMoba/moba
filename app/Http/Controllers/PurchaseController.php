<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\DetailPurchase;
use App\Models\MaterialsRaw;
use App\Models\Person;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

/**
 * Class PurchaseController
 * @package App\Http\Controllers
 */
class PurchaseController extends Controller
{
    public function generatePDF(Request $request)
    {
        $filter = $request->input('findId');

        if ($filter) {
            $purchases = Purchase::where('id_card', $filter)->get();
        } else {
            $purchases = Purchase::all();
        }

        $data = [
            'purchases' => $purchases
        ];

        $pdf = new Dompdf();
        $pdf->loadHtml(view('purchase.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Registro_Compras.pdf');
    }

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
            ->orwhere('date', 'LIKE', '%' . $search . '%')
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

        $people = Person::pluck('id_card', 'id')->map(function ($id_card, $id) {
            $person = Person::find($id);
            return "$id_card - $person->addres";
        })->toArray();

        $purchaseName = $purchase->name;

        $detailPurchase = new DetailPurchase();
        $purchases = Purchase::pluck('name', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');
        $confirm = false;

        return view('purchase.create', compact('purchase', 'people', 'detailPurchase', 'purchases', 'materialsRaws', 'purchaseName', 'confirm'));
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

        // Crear detalle de compra relacionado con la compra recién creada
        $detailPurchaseData = $request->input('detail_purchase');

        $detailPurchaseData['materials_raws_id'] = $request->input('materials_raws_id');
        $detailPurchaseData['quantity'] = $request->input('quantity');
        $detailPurchaseData['price_unit'] = $request->input('price_unit');
        $detailPurchaseData['subtotal'] = $request->input('subtotal');
        $detailPurchaseData['discount'] = $request->input('discount');
        $detailPurchaseData['total'] = $request->input('total');
        $detailPurchaseData['materials_raws_id'] = $request->input('materials_raws_id');

        $purchase->detailPurchases()->create($detailPurchaseData);

        return redirect()->route('purchases.index')
            ->with('success', 'Registro creado exitosamente')
            ->with('purchaseName', $purchase->name);
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

        $people = Person::pluck('id_card', 'id')->map(function ($id_card, $id) {
            $person = Person::find($id);
            return "$id_card - $person->addres";
        })->toArray();

        $purchaseName = $purchase->name;

        $detailPurchase = $purchase->detailPurchases();

        $purchases = Purchase::pluck('name', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');

        return view('purchase.show', compact('purchase', 'people', 'purchaseName', 'detailPurchase', 'purchases', 'materialsRaws'));
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
        $people = Person::pluck('id_card', 'id')->map(function ($id_card, $id) {
            $person = Person::find($id);
            return "$id_card - $person->addres";
        })->toArray();

        $purchaseName = $purchase->name;

        $detailPurchase = $purchase->detailPurchases();

        $purchases = Purchase::pluck('name', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');

        $confirm = true;

        return view('purchase.edit', compact('purchase', 'people', 'purchaseName', 'detailPurchase', 'purchases', 'materialsRaws', 'confirm'));
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

        // Actualizar la compra
        $purchase->update($request->all());

        // Obtener el detalle relacionado con la compra
        $detailPurchase = $purchase->detailPurchases();

        // Validar y actualizar el detalle de compra
        $request->validate(DetailPurchase::$rules);
        $detailPurchase->update($request->input('detail_purchase'));

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
