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
         $request->validate([
             'name' => 'required',
             'people_id' => 'required',
             'date' => 'required|date',
             'quotes_id' => 'required',
             'detalles.*.product' => 'required',
             'detalles.*.quantity' => 'required|integer',
             'detalles.*.price_unit' => 'required|numeric',
             'detalles.*.subtotal' => 'required|numeric',
             'detalles.*.discount' => 'required|numeric',
             'detalles.*.total' => 'required|numeric',
         ]);
     
         // Crear una nueva venta
         $sale = new Sale();
         $sale->name = $request->input('name');
         $sale->people_id = $request->input('people_id');
         $sale->date = $request->input('date');
         $sale->quotes_id = $request->input('quotes_id');
         $sale->save();
     
         // Recorrer los detalles de la venta y guardarlos en la base de datos
         foreach ($request->input('detalles') as $detalle) {
             $detalleVenta = new DetailSale();
             $detalleVenta->quantity = $detalle['quantity'];
             $detalleVenta->price_unit = $detalle['price_unit'];
             $detalleVenta->subtotal = $detalle['subtotal'];
             $detalleVenta->discount = $detalle['discount'];
             $detalleVenta->total = $detalle['total'];
             $detalleVenta->sale_id = $sale->id; // Asociar el detalle con la venta creada
             $detalleVenta->product_id = $detalle['product'];
             $detalleVenta->save();
         }
     
         return redirect()->route('sales.index')
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
        $people = Person::pluck('id_card', 'id')->map(function ($id_card, $id) {
            $person = Person::find($id);
            return "$id_card - $person->addres";
        })->toArray();

        

        

        $purchases = Purchase::pluck('name', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');

        return view('purchase.show', compact('purchase', 'people', 'purchases', 'materialsRaws'));
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
