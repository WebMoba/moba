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
use Dompdf\Dompdf as DompdfDompdf;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class SaleController
 * @package App\Http\Controllers
 */
class SaleController extends Controller
{
    public function pdf()
    {

        $sales = Sale::all();

        $pdf = Pdf::loadView('sale.pdf-template', ['sales' => $sales])
                    ->setPaper('a4','portrait');

        $pdf->set_option('isRemoteEnabled', true);

        return $pdf->download('Listado Ventas.pdf');
    }

    public function detailPdf($id)
    {

        $sale = Sale::with('detailSales')
        ->find($id);

        if (!$sale) {
            return redirect()->back()->with('error', 'No se encontró la cotización');
        }

        $pdf = Pdf::loadView('sale.pdf-template-detail', ['sale' => $sale])
                    ->setPaper('a4','portrait');

        $pdf->set_option('isRemoteEnabled', true);

        return $pdf->download('Listado Ventas.pdf');
    }

    public function generatePDF(Request $request)
    {
        // Aumentar el límite de tiempo de ejecución a 120 segundos
        set_time_limit(120);
        // Aumentar el límite de memoria a 256MB
        ini_set('memory_limit', '256M');

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
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->loadHtml(view('sale.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Registro_Venta.pdf');
    }


   public function generateDetailPDF(Request $request)
    {
        // Aumentar el límite de tiempo de ejecución a 120 segundos
        set_time_limit(120);
        // Aumentar el límite de memoria a 256MB
        ini_set('memory_limit', '256M');

        $filter = $request->input('findId');

        // Obtener los datos de la venta y sus detalles
        if ($filter) {
            $sale = Sale::with('detailSales.product', 'person')->find($filter);
        } else {
            // Si no hay filtro, redirigir a otra página o mostrar un error
            return redirect()->back()->with('error', 'No se encontró la venta');
        }

        // Pasar los datos a la vista pdf-template
        $data = [
            'sale' => $sale
        ];

        // Generar el PDF
        $pdf = new Dompdf();
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->loadHtml(view('sale.pdf-template-detail', $data)->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Venta_detallada.pdf');
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
            ->orWhereHas('person', function ($query) use ($search) {
                $query->where('id_card', 'LIKE', '%' . $search . '%');
            })
            ->orWhere('date', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
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
                    ->where('disable', false);
            })
            ->get()
            ->mapWithKeys(function ($user) {
                $providerName = $user->name;
                $providerDocument = $user->person ? $user->person->id_card : '';
                return [$user->id => $providerName . ' - ' . $providerDocument];
            });

        // Obtener una lista de productos para el select
        $products = Product::where('disable', false)->pluck('name', 'id');

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
            $venta->total = $data['totalP'];
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
        $sale = Sale::with('person', 'user', 'detailSales.product')->findOrFail($id);
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
    
     /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy($id)
    {
        // Encuentra la venta con el ID dado
        $sale = Sale::find($id);
        if (!$sale) {
            return redirect()->route('sales.index')->with('error', 'La venta no existe');
        }

        // Anula la venta (asumiendo que 'disable' representa el estado de anulación)
        $sale->disable = true;
        $sale->save();

        // Redirige con un mensaje de éxito
        return redirect()->route('sales.index')->with('success', 'La venta ha sido anulada con éxito');
    }

    public function exportToExcel()
    {
        return Excel::download(new SalesExport(), 'sales.xlsx');
    }
}
