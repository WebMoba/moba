<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\SalesExport;
use App\Models\DetailSale;
use App\Models\Person;
use App\Models\Product;
use App\Models\Quote;
use App\Models\Sale;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
            'sales' => $sales,
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
        $detailSale = null;


        // Obtener una lista de personas con el formato adecuado para el select
        $people = Person::select('id', 'name', 'id_card')->get()->pluck('name', 'id');

        // Obtener los ID Cards de las personas para el select
        $idCards = Person::pluck('id_card', 'id');


        $providers = Person::whereHas('teamWork')
            ->where('rol', 'Cliente')
            ->where('disable', false) // Agregar esta línea
            ->get();

        $usersName = User::with('person')
            ->whereHas('person', function ($query) {
                $query->where('rol', 'Cliente')
                    ->where('users_id', '!=', null)
                    ->where('disable', false); // Agregar esta línea
            })
            ->pluck('name', 'id');

        // Obtener una lista de productos para el select
        $products = Product::pluck('name', 'id');

        // Obtener los precios de los productos y pasarlos a la vista
        $productPrices = Product::pluck('price', 'id')->toArray();

        // Obtener una lista de cotizaciones para el select
        $quotes = Quote::pluck('id', 'id');

        $confirm = false;

        // Crear una nueva instancia de detalle de venta
        $detailSale = new DetailSale();

        $productPrices = Product::pluck('price', 'id')->toArray();
        return view('sale.create', compact('sale', 'usersName', 'providers', 'people', 'quotes', 'confirm', 'products', 'detailSale', 'productPrices', 'idCards'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


     public function store(Request $request)
     {
         try {
             // Obtener los datos enviados desde el formulario
             $data = $request->input('data');
     
             // Crear una nueva venta
             $venta = new Sale();
             $venta->name = $data['nombre_cliente'];
             $venta->date = $data['fecha'];
             $venta->quotes_id = $data['cotizacion_id'];
             $venta->people_id = $data['cliente_id'];
             $venta->save();
     
             // Recorrer y guardar los detalles de la venta en la base de datos
             foreach ($data['detalles'] as $detalle) {
                 $detalleVenta = new DetailSale();
                 $detalleVenta->quantity = $detalle['cantidad'];
                 $detalleVenta->price_unit = $detalle['precio_unitario'];
                 $detalleVenta->subtotal = $detalle['subtotal'];
                 $detalleVenta->discount = $detalle['descuento'] ?? 0; // Valor predeterminado de descuento
                 $detalleVenta->total = $detalle['total'];
                 $detalleVenta->products_id = $detalle['producto_id'];
                 $detalleVenta->sales_id = $venta->id; // Asociar el detalle con la venta creada
                 $detalleVenta->save();
             }
     
             // Retornar una respuesta de éxito
             return response()->json(['success' => true, 'message' => 'Registro creado exitosamente']);
     
         } catch (\Exception $e) {
             // Manejar cualquier excepción que ocurra durante el proceso
             return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
         }
     }
     






     public function show($id)
     {
         $sale = Sale::with('person', 'user')->findOrFail($id);
         $details = DetailSale::where('sales_id', $id)->get();
 
         return view('sale.show', compact('sale', 'details'));
     }

    public function edit($id)
    {
        $sale = Sale::find($id);
        $people = Person::pluck('name', 'id');
        $products = Product::pluck('name', 'id');
        $detailSale = $sale->detailSales()->first();
        $sales = Sale::pluck('name', 'id');
        $confirm = true;

        return view('sale.edit', compact('sale', 'detailSale', 'people', 'confirm', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'people_id' => 'required',
            'date' => 'required|date',
            'quotes_id' => 'required',
        ]);

        // Actualizar la venta
        $sale->update([
            'people_id' => $request->people_id,
            'date' => $request->date,
            'quotes_id' => $request->quotes_id,
        ]);

        // Obtener el detalle relacionado con la venta
        $detailSale = $sale->detailSales()->first();

        if ($detailSale) {
            // Validar y actualizar el detalle de venta
            $request->validate([
                'quantity' => 'required|integer',
                'price_unit' => 'required|integer',
                'subtotal' => 'required|integer',
                'discount' => 'required|integer',
                'total' => 'required|integer',
            ]);

            $detailSale->update([
                'quantity' => $request->quantity,
                'price_unit' => $request->price_unit,
                'subtotal' => $request->subtotal,
                'discount' => $request->discount,
                'total' => $request->total,
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Venta actualizada con éxito');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        // Eliminar los detalles de la venta asociados
        $sale->detailSales()->delete();

        // Eliminar la venta
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Venta eliminada con éxito');
    }

    public function exportToExcel()
    {
        return Excel::download(new SalesExport(), 'sales.xlsx');
    }
}
