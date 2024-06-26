<?php

namespace App\Http\Controllers;

use App\Models\Quote;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Person;
use App\Models\DetailQuote;
use App\Models\Project;
use App\Models\Service;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf as DompdfDompdf;
use PhpParser\Node\Expr\New_;
use App\Exports\QuoteExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


/**
 * Class QuoteController
 * @package App\Http\Controllers
 */
class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = trim($request->get('search'));
        $quotes = Quote::with('person');
        $quotes = Quote::select('id', 'date_issuance', 'description', 'total', 'discount', 'status', 'people_id', 'disable')
            ->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('description', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('quote.index', compact('quotes', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $quotes->perPage());
    }

    // public function index(Request $request)
    // {
    //     $search = trim($request->get('search'));
    //     $quotes = Quote::with('person') // Cargar los datos de la persona asociada a la cotización
    //         ->select('id', 'date_issuance', 'description', 'total', 'discount', 'status', 'people_id', 'disable')
    //         ->where('id', 'LIKE', '%' . $search . '%')
    //         ->orWhere('description', 'LIKE', '%' . $search . '%')
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(10);

    //     return view('quote.index', compact('quotes', 'search'))
    //         ->with('i', (request()->input('page', 1) - 1) * $quotes->perPage());
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $quote = new Quote();
    //     $detailQuote = new DetailQuote();

    //     $services = Service::pluck('name', 'id');
    //     $products = Product::pluck('name', 'id');
    //     $projects = Project::pluck('name', 'id');
    //     $quotes = Quote::pluck('description', 'id');
    //     $quote->date_issuance = now()->format('Y-m-d');

    //     $clients = Person::where('rol', 'Cliente')
    //         ->where('disable', false) // Agregar esta línea si es necesario
    //         ->get();

    //     $persons = User::with('person')
    //         ->whereHas('person', function ($query) {
    //             $query->where('rol', 'Cliente')
    //                 ->where('users_id', '!=', null)
    //                 ->where('disable', false);
    //         })
    //         ->pluck('name', 'id');

    //     // $clients = Person::clients()->get();

    //     return view('quote.create', compact('quote', 'clients', 'detailQuote', 'persons', 'services', 'products', 'projects', 'quotes'));
    // }

    public function create()
    {
        $quote = new Quote();
        $detailQuote = new DetailQuote();

        $services = Service::pluck('name', 'id');
        $products = Product::pluck('name', 'id');
        $projects = Project::pluck('name', 'id');
        $quotes = Quote::pluck('description', 'id');
        $quote->date_issuance = now()->format('Y-m-d');

        $clients = Person::where('rol', 'Cliente')
            ->where('disable', false) // Agregar esta línea si es necesario
            ->get()
            ->pluck('name', 'id');

        return view('quote.create', compact('quote', 'clients', 'detailQuote', 'services', 'products', 'projects', 'quotes'));
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
            'date_issuance' => 'required|date',
            'description' => 'required|string|max:300',
            'total' => 'required|numeric',
            'discount' => 'required|numeric',
            'status' => 'required|in:aprobado,rechazado,pendiente',
            'people_id' => 'required',
        ]);

        $total = $request->input('total');
        $discountPercentage = $request->input('discount');
        $discountAmount = ($total * $discountPercentage) / 100;
        $totalAfterDiscount = $total - $discountAmount;

        $quote = Quote::create([
            'date_issuance' => $request->input('date_issuance'),
            'description' => $request->input('description'),
            'total' => $totalAfterDiscount,
            'discount' => $discountPercentage, // Guardamos el porcentaje de descuento
            'status' => $request->input('status'),
            'people_id' => $request->input('people_id'),
        ]);

        // Obtener los detalles de los campos del formulario
        $servicesIds = $request->input('services_id', []);
        $productsIds = $request->input('products_id', []);
        $projectsIds = $request->input('projects_id', []);

        $maxItems = max(count($servicesIds), count($productsIds), count($projectsIds));

        for ($i = 0; $i < $maxItems; $i++) {
            $serviceId = $servicesIds[$i] ?? null;
            $productId = $productsIds[$i] ?? null;
            $projectId = $projectsIds[$i] ?? null;

            if ($serviceId || $productId || $projectId) {
                DetailQuote::create([
                    'services_id' => $serviceId,
                    'products_id' => $productId,
                    'projects_id' => $projectId,
                    'quotes_id' => $quote->id,
                ]);
            }
        }

        return redirect()->route('quotes.index')->with('success', 'Cotización creada exitosamente');
    }

    public function update(Request $request, Quote $quote)
    {
        $msj = [
            'required' => 'El atributo es requerido',
            'max' => 'No puede ingresar mas caracteres en este campo',
            'string' => 'El campo debe ser una cadena de texto.',
            'date' => 'El campo no debe ser una fecha anterior al dia de Hoy.',
        ];

        $request->validate([
            'date_issuance' => 'required|date',
            'description' => 'required|string|max:300',
            'total' => 'required|numeric',
            'discount' => 'required|numeric',
            'status' => 'required|in:aprobado,rechazado,pendiente',
            'people_id' => 'required',
        ], $msj);

        $total = $request->input('total');
        $discountPercentage = $request->input('discount');
        $discountAmount = ($total * $discountPercentage) / 100;
        $totalAfterDiscount = $total - $discountAmount;

        $quote->update([
            'date_issuance' => $request->input('date_issuance'),
            'description' => $request->input('description'),
            'total' => $totalAfterDiscount,
            'discount' => $discountPercentage,
            'status' => $request->input('status'),
            'people_id' => $request->input('people_id'),
        ]);

        return redirect()->route('quotes.index')->with('success', 'Cotización actualizada exitosamente');
    }






    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote = Quote::with('person', 'detailQuotes')->find($id);
        // $quote = Quote::find($id);
        // Convierte la fecha a un formato de cadena 'Y-m-d'
        // $quote->date_issuance = $quote->date_issuance ? $quote->date_issuance->format('Y-m-d') : null;
        $persons = User::with('person')
            ->whereHas('person', function ($query) {
                $query->where('rol', 'Cliente')
                    ->where('users_id', '!=', null)
                    ->where('disable', false);
            })
            ->pluck('name', 'id');
        $detailQuote = DetailQuote::where('quotes_id', $quote->id)->get();
        $detailQuote = $quote->detailQuotes;
        $quote->load('detailQuotes');
        return view('quote.show', compact('quote', 'detailQuote','persons'));
    }
    // public function show($id)
    // {
    //     $quote = Quote::with('person', 'detailQuotes')->find($id); // Cargar los datos de la persona asociada a la cotización y los detalles
    //     return view('quote.show', compact('quote'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quote::find($id);
        $detailQuote = new DetailQuote();
        $persons = Person::pluck('id_card', 'id');
        $services = Service::pluck('name', 'id');
        $products = Product::pluck('name', 'id');
        $projects = Project::pluck('name', 'id');
        $quotes = Quote::pluck('description', 'id');
        $quote->date_issuance = now()->format('Y-m-d');
        return view('quote.create', compact('quote', 'detailQuote', 'persons', 'services', 'products', 'projects', 'quotes'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Quote $quote
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Quote $quote)
    // {

    //     $msj = [
    //         'required' => 'El atributo es requerido',
    //         'max' => 'No puede ingresar mas caracteres en este campo',
    //         'string' => 'El campo debe ser una cadena de texto.',
    //         'date' => 'El campo no debe ser una fecha anterior al dia de Hoy.',
    //     ];

    //     $request->validate([
    //         'date_issuance' => 'required|date',
    //         'description' => 'required|string|max:300',
    //         'total' => 'required|numeric',
    //         'discount' => 'required|numeric',
    //         'status' => 'required|in:aprobado,rechazado,pendiente',
    //         'people_id' => 'required',
    //     ], $msj);

    //     // request()->validate(Quote::$rules);

    //     $quote->update($request->all());

    //     return redirect()->route('quotes.index')
    //         ->with('success', 'Quote updated successfully');
    // }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $quote = Quote::find($id);

        if (!$quote) {
            return redirect()->route('quotes.index')->with('error', 'La cotización no existe');
        }

        // Cambiar el estado de habilitado/deshabilitado
        $quote->disable = !$quote->disable; // Cambia disabled a disable
        $quote->save();

        // Redirigir de vuelta a la lista de cotizaciones
        return redirect()->route('quotes.index')->with('success', 'Estado de la cotización cambiada con éxito');
    }

    public function pdf()
    {
        $quotes = Quote::with('person')->get();
        
        $pdf = Pdf::loadView('quote.pdf-template', ['quotes' => $quotes])
                    ->setPaper('a4', 'portrait');

        $pdf->set_option('isRemoteEnabled', true);

        return $pdf->download('Listado Cotizaciones.pdf');
    }


    public function detailPdf($id)
    {
        $quote = Quote::with('detailQuotes.service', 'detailQuotes.product', 'detailQuotes.project')
            ->find($id);

        if (!$quote) {
            return redirect()->back()->with('error', 'No se encontró la cotización');
        }

        $pdf = Pdf::loadView('quote.pdf-template-detail', ['quote' => $quote])
            ->setPaper('a4', 'portrait');

        return $pdf->download('Detalle_Cotizacion.pdf');
    }

  

    public function export()
    {
        return Excel::download(new QuoteExport, 'Listado_Cotizaciones.xlsx');
    }
}