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
    // Obtener el filtro de la solicitud
    $filter = $request->input('findId');
    
    // Obtener los datos de las personas filtradas si se aplicó un filtro
    if ($filter) {
        $purchases = Purchase::where('id_card', $filter)->get();
        
    } else {
        // Si no hay filtro, obtener todas las personas
        $purchases = Purchase::all();
    }
    // Pasar los datos a la vista pdf-template
    $data = [
        'purchases' => $purchases
    ];    

    // Generar el PDF
    $pdf = new Dompdf();
    $pdf->loadHtml(view('purchase.pdf-template', $data));
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    return $pdf->stream('document.pdf');
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

        // Obtener el nombre de la compra
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
    dd($request->all());
    // Validar los datos de la compra
    $request->validate(Purchase::$rules);

    // Crear la compra
    $purchase = Purchase::create($request->all());

    // Obtener todos los datos de los detalles de compra de la solicitud
    $detailPurchaseData = $request->all();

    // Iterar sobre los datos de detalle de compra
    $detailKeys = array_filter(array_keys($detailPurchaseData), function ($key) {
        return strpos($key, 'materials_raws_id_') === 0;
    });

    foreach ($detailKeys as $key) {
        // Obtener el índice del detalle de compra
        $index = substr($key, strrpos($key, '_') + 1);

        // Construir el conjunto de datos del detalle de compra
        $detailData = [
            'materials_raws_id' => $detailPurchaseData['materials_raws_id_' . $index],
            'quantity' => $detailPurchaseData['quantity_' . $index],
            'price_unit' => $detailPurchaseData['price_unit_' . $index],
            'subtotal' => $detailPurchaseData['subtotal_' . $index],
            'discount' => $detailPurchaseData['discount_' . $index],
            'total' => $detailPurchaseData['total_' . $index],
        ];

        // Crear el detalle de compra y asociarlo con la compra principal
        $purchase->detailPurchases()->create($detailData);
    }

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

        $detailPurchase = $purchase->detailPurchases()->get();

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

        //$detailPurchase = $purchase->detailPurchases()->get();

        $detailPurchase = DetailPurchase::find($id);


        $purchases = Purchase::pluck('name', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');

        $confirm = true;


        return view('purchase.create', compact('purchase', 'people', 'detailPurchase', 'purchases', 'materialsRaws', 'purchaseName', 'confirm'));
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
        $detailPurchase = $purchase->detailPurchases()->get();

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
