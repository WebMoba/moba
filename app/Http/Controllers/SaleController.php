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
        $people = Person::pluck('name', 'id_card', 'id');

        // Obtener una lista de productos para el select
        $products = Product::pluck('name', 'id');

        // Obtener una lista de cotizaciones para el select
        $quotes = Quote::pluck('id', 'id');

        $confirm = false;

        // Crear una nueva instancia de detalle de venta
        $detailSale = new DetailSale();

        return view('sale.create', compact('sale', 'people', 'quotes', 'confirm', 'products', 'detailSale'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'people_id' => 'required',
            'date' => 'required|date',
            'quotes_id' => 'required',
        ]);

        // Crear una nueva venta
        $sale = new Sale();
        $sale->name = $request->input('nombre_cliente');
        $sale->people_id = $request->input('id_cliente');
        $sale->date = $request->input('fecha');
        $sale->quotes_id = $request->input('cotizaciones');
        $sale->save();

        // Recorrer los detalles de la venta y guardarlos en la base de datos
        foreach ($request->input('detalles') as $detalle) {
            $detalleVenta = new DetailSale();
            $detalleVenta->quantity = $detalle['cantidad'];
            $detalleVenta->price_unit = $detalle['precio_unitario'];
            $detalleVenta->subtotal = $detalle['subtotal'];
            $detalleVenta->discount = $detalle['descuento'];
            $detalleVenta->total = $detalle['total'];
            $detalleVenta->sale_id = $sale->id; // Asociar el detalle con la venta creada
            $detalleVenta->product_id = $detalle['product'];
            $detalleVenta->save();
        }

        return redirect()->route('sales.index')->with('success', 'Registro creado exitosamente');
    }




    public function show($id)
    {
        $sale = Sale::findOrFail($id);

        // Obtener el nombre de la persona asociada a la venta
        $people = Person::pluck('name', 'id_card', 'id');

        $products = Product::pluck('name', 'id');

        // Obtener los detalles de la venta
        $detailSale = $sale->detailSales->first();

        // Verificar si $detailSale no es null antes de continuar
        if ($detailSale) {
            // Obtener los productos asociados a los detalles de la venta
            return view('sale.show', compact('sale', 'detailSale', 'people', 'products'));
        } else {
            // Si no hay detalles de venta, enviar null a la vista
            return view('sale.show', compact('sale', 'detailSale', 'people', 'products'));
        }
    }

    public function edit($id)
    {
        $sale = Sale::find($id);
        $people = Person::pluck('name', 'id');
        $salesName = $sale->name;
        $products = Product::pluck('name', 'id');
        $detailSale = $sale->detailSales()->first();
        $sales = Sale::pluck('name', 'id');
        $confirm = true;

        return view('sale.edit', compact('sale', 'detailSale', 'people', 'confirm', 'products', 'salesName'));
    }


    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'name' => 'required',
            'people_id' => 'required',
            'date' => 'required|date',
            'quotes_id' => 'required',
        ]);

        // Actualizar la venta
        $sale->update([
            'name' => $request->name,
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
}
