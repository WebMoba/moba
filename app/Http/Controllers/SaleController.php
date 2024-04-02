<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quote;
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

        //Obtener los datos de las ** filtrados si se apica un filtro
        if ($filter) {
            $sales = Sale::where('id_card', $filter)->get();
        
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
        $pdf = loadHtml(view('sale.pdf-template', $data));
        $pdf = setPaper('A4', 'portrait');
        $pdf = render(); 

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
        $sales = Sale::with('person') 
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('date', 'LIKE', '%' . $search . '%')
            ->paginate(10);
        
        return view('sale.index', compact('sales', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $sales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sale = new Sale();
        $sale->date = now()->format('Y-m-d');
        $people = Person::pluck('id_card', 'id')->map(function ($id_card, $id) {
        
            $person = Person::find($id);
            return "$id_card - $person->addres";
        })->toArray();

        // Obtener el nombre de la compra
        $salesName = $sale->name;

        $detailSale = new DetailSale();
        $quote = Quote::pluck('people_id', 'id');
        $confirm = false;
        
        $detailSale->products_id = $request->input('product_id');
        
        // Obtener los productos de la tabla 'products'
        $products = Product::pluck('name', 'id');

        return view('sale.create', compact('sale', 'detailSale', 'people', 'quote', 'salesName', 'confirm', 'products'));
        
    }


   public function store(Request $request)
{
    // Valida los datos de la solicitud según las reglas definidas en el modelo Sale
    $request->validate(Sale::$rules);

    // Crea una nueva venta con los datos proporcionados en la solicitud
    $sale = Sale::create($request->all());

    // Crea el detalle de la venta relacionado con la venta recién creada
    $detailSaleData = $request->input('detail-sale', []);

    // Verifica si se proporcionó información de detalle de venta
    if (!empty($detailSaleData)) {
        foreach ($detailSaleData as $detail) {
            // Asigna el ID de la venta recién creada al detalle de venta
            $detail['sales_id'] = $sale->id;
            // Crea el detalle de la venta en la base de datos
            $sale->detailSales()->create($detail);
        }
    }

    // Redirige a la ruta de índice de ventas con un mensaje de éxito
    return redirect()->route('sales.index')
        ->with('success', 'Registro creado exitosamente')
        ->with('saleName', $sale->name);
}

 

/*

    public function store(Request $request)
    {
        request()->validate(Sale::$rules);

        $sale = Sale::create($request->all());

        //Crear detalle de compra relacionado con la compra recién creada
        $detailSaleData = $request->input('detail-sale');

        $detailSaleData['products_id'] = $request->input('products_id');
        $detailSaleData['quantity'] = $request->input('quantity');
        $detailSaleData['price_unit'] = $request->input('price_unit');
        $detailSaleData['subtotal'] = $request->input('subtotal');
        $detailSaleData['discount'] = $request->input('discount');
        $detailSaleData['total'] = $request->input('total');

        $detailSaleData['product_id']= $request->input('product_id');
        $sale->detailSales()->create($detailSaleData);

        return redirect()->route('sales.index')
            ->with('success', 'Registro creado exitosamente')
            ->with('sailName', $sale->name); 

        
    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $sale = Sale::with('product')->findOrFail($id);
        $people = Person::pluck('id_card', 'id')->map(function ($id_card, $id) {
            $person = Person::find($id);
            return "$id_card - $person->addres";
    })->toArray();

        $salesName = $sale->name;
        $detailSale = $sale->detailSales()->first();
        $sales = Sale::pluck('name', 'id');
        $products = Product::pluck('name', 'id');
        $productNames = $sale->product->pluck('name')->toArray();
        

    return view('sale.show', compact('sale', 'detailSale', 'people', 'salesName', 'productNames'));
            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    
     public function edit($id)
    {
            $sale = Sale::find($id);
            $people = person::pluck('id_card', 'id')->map(function ($id_card, $id){
                $person = Person::find($id);
                return "$id_card - $person->addres";
            })->toArray();

        $salesName = $sale->name;

        $detailSale = $sale->detailSales()->first();

        $sales = Sale::pluck('name', 'id');
        $products = Product::pluck('name', 'id');
        $confirm = true;
        
        return view('sale.edit', compact('sale', 'detailSale', 'people', 'confirm',  'products', 'salesName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
       
       request()->validate(Sale::$rules);

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
            ->with('success', 'Venta actualizada con Exitosamente');
}    

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy($id)
    {
        $sales = Sale::find($id);

        DetailSale::where('sales_id', $id)->delete();
       
        $sales->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Venta eliminada con exito');
    }
}
