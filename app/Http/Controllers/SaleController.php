<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quote;
use App\Models\User;
use App\Models\Person;
use App\Models\Sale;
use App\Models\DetailSale;
use Illuminate\Http\Request;

use Dompdf\Dompdf;

/**
 * Class SaleController
 * @package App\Http\Controllers
 */
class SaleController extends Controller
{
    
    public function generatePDF(Request $request)
    {
        //Obtener el filtro de la solicitud
        $filter = $request->input('findId');

        //Obtener los datos de las ventas filtrados si se aplica un filtro
        if ($filter) {
            $sales = Sale::where('id', $filter)->get();        
        } else {
            // si no hay filtro, obtener todos los datos
            $sales = Sale::all();
        }
        // Pasar los datos a la vista a PDF-TEMPLATE
        $data = [
            'sales' => $sales
        ];

        //Generar el PDF
        $pdf = new Dompdf();
        $pdf->loadHtml(view('sale.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render(); 
        return $pdf->stream('Registro_Venta.pdf');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $sales = Sale::with('person', 'quote', 'detailSales.product')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('date', 'LIKE', '%' . $search . '%')
            ->paginate(10);

        /**
        $sales = Sale::with('person') 
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('date', 'LIKE', '%' . $search . '%')
            ->paginate(10);
         */

        // Obtener los detalles de las ventas
        $detailSales = DetailSale::all(); // o alguna otra forma de obtener los detalles de las ventas
        
        
        return view('sale.index', compact('sales', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $sales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $sale = new Sale();
    $sale->date = now()->format('Y-m-d');
    
    $people = Person::pluck('name', 'id')->map(function ($name, $id) {
        $person = Person::find($id);
        return "$name - $person->id_card - $person->address";
    })->toArray();
    
    $salesName = $sale->name;
    
    $products = Product::pluck('name', 'id'); // Cargar todos los productos
    
    $quote = Quote::pluck('people_id', 'id');
    
    $confirm = false;

    // Aquí creamos una nueva instancia de detalle de venta
    $detailSale = new DetailSale();

    return view('sale.create', compact('sale', 'people', 'quote', 'salesName', 'confirm', 'products', 'detailSale'));
}

    
    

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'people_id' => 'required',
        'date' => 'required|date',
        'quotes_id' => 'required',
    ]);

    $sale = Sale::create($request->all());

    if ($request->has('products_id')) {
        foreach ($request->products_id as $key => $productId) {
            $detailSale = new DetailSale([
                'products_id' => $productId,
                'quantity' => $request->quantity[$key], 
                'price_unit' => $request->price_unit[$key],
                'subtotal' => $request->subtotal[$key],
                'discount' => $request->discount[$key],
                'total' => $request->total[$key]
            ]);
            $sale->detailSales()->save($detailSale);
        }
    }

    return redirect()->route('sales.index')->with('success', 'Registro creado exitosamente');
}

        public function show($id)
        {
            $sale = Sale::findOrFail($id);
            
            // Obtener el nombre de la persona asociada a la venta
            $personName = $sale->person->name;

            // Obtener los detalles de la venta
            $detailSale = $sale->detailSales;

            // Obtener los productos asociados a los detalles de la venta
            $products = Product::pluck('name', 'id');

            return view('sale.show', compact('sale', 'detailSale', 'personName', 'products'));
        }


     
        public function edit($id)
        {
            $sale = Sale::find($id);
            $people = Person::pluck('id_card', 'id')->map(function ($id_card, $id){
                $person = Person::find($id);
                return "$id_card - $person->address";
            })->toArray();
        
            $salesName = $sale->name;
            $products = Product::pluck('name', 'id'); // Cargar todos los productos
            $detailSale = $sale->detailSales()->first();
        
            $sales = Sale::pluck('name', 'id');
            $confirm = true;
            
            return view('sale.edit', compact('sale', 'detailSale', 'people', 'confirm',  'products', 'salesName'));
        }
        
    public function update(Request $request, Sale $sale)
    {
        $request->validate(Sale::$rules);

        // Actualizar la venta
        $sale->update($request->all());

        //obtener el detalle relacionado con la venta
        $detailSale = $sale->detailSales()->first();

        if ($detailSale) {

            //Validar y actualizar el detalle de compra
            $request->validate(DetailSale::$rules);

            $detailSaleData = $request->only([
                'products_id',
                'quantity',
                'price_unit',
                'subtotal',
                'discount',
                'total',
            ]);

            $detailSale->update($detailSaleData);
        }
       
        return redirect()->route('sales.index')
            ->with('success', 'Venta actualizada con éxito');
    }

    public function destroy($id)
    {
        $sales = Sale::find($id);

        DetailSale::where('sale_id', $id)->delete();
       
        $sales->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Venta eliminada con éxito');
    }

}
