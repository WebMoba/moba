<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Purchase;
use App\Models\DetailPurchase;
use App\Models\MaterialsRaw;
use App\Models\Person;
use Illuminate\Http\Request;
use Dompdf\Dompdf;


use App\Exports\PurchasesExport;
use Maatwebsite\Excel\Facades\Excel;


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
        $purchases = Purchase::with('person', 'user')
            ->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('person', function ($query) use ($search) {
                $query->where('id_card', 'LIKE', '%' . $search . '%');
            })
            ->orWhere('date', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
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


        $providers = Person::whereHas('teamWork')
            ->where('rol', 'Proveedor')
            ->get('id_card');


        $usersName = User::with('person')
            ->whereHas('person', function ($query) {
                $query->where('rol', 'Proveedor')
                    ->where('disable', false);
            })
            ->get()
            ->mapWithKeys(function ($user) {
                $providerName = $user->name;
                $providerDocument = $user->person ? $user->person->id_card : '';
                return [$user->id => $providerName . ' - ' . $providerDocument];
            });




        $detailPurchase = new DetailPurchase();
        $purchases = Purchase::pluck('name', 'id');
        $materialsRaws = MaterialsRaw::pluck('name', 'id');

        $purchaseName = $purchase->name;
        $confirm = false;

        $providers = $providers ?? collect(); // Si $providers no está definido o es null, se asigna una colección vacía

        return view('purchase.create', compact('purchase', 'providers', 'detailPurchase', 'purchases', 'materialsRaws', 'purchaseName', 'confirm', 'usersName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {


        // Acceder a los datos enviados desde el formulario
        $datos = $request->input('data');

        // Crear una nueva compra
        $compra = new Purchase();
        $compra->name = $datos['nombre_proveedor'];
        $compra->date = $datos['fecha'];
        $compra->total = $datos['totalP'];
        $compra->people_id = $datos['proveedor_id'];
        $compra->save();


        // Recorrer los detalles de la compra y guardarlos en la base de datos
        foreach ($datos['detalles'] as $detalle) {
            $detalleCompra = new DetailPurchase();
            $detalleCompra->quantity = $detalle['cantidad'];
            $detalleCompra->price_unit = $detalle['precio_unitario'];
            $detalleCompra->subtotal = $detalle['subtotal'];
            $detalleCompra->discount = $detalle['descuento'];
            $detalleCompra->total = $detalle['total'];
            $detalleCompra->materials_raws_id = $detalle['materia_prima'];
            $detalleCompra->purchases_id = $compra->id; // Asociar el detalle con la compra creada
            $detalleCompra->save();
        }

        // Retornar una respuesta de redirección
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
        $purchase = Purchase::with('person', 'user')->findOrFail($id);
        $details = DetailPurchase::where('purchases_id', $id)->get();

        return view('purchase.show', compact('purchase', 'details'));
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
        // Encuentra la materia prima con el ID dado
        $purchase = Purchase::find($id);
        if (!$purchase) {
            return redirect()->route('purchases.index')->with('error', 'La compra no existe');
        }

        // Cambia el estado de la materia prima
        $purchase->disable = !$purchase->disable; // Corregir a 'disabled'
        $purchase->save();

        // Redirige con un mensaje de éxito
        return redirect()->route('purchases.index')->with('success', 'Estado de la compra cambiado con éxito');
    }

    public function exportToExcel()
    {
        return Excel::download(new PurchasesExport, 'purchases.xlsx');
    }
}
