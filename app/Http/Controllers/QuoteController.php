<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\DetailQuote;
use App\Models\Project;
use App\Models\Service;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf as DompdfDompdf;
use PhpParser\Node\Expr\New_;


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
        $quotes=DB::table('quotes')
                    ->select('id','date_issuance','description','total','discount','status','people_id')
                    ->where('id','LIKE','%'.$search.'%')
                    ->orWhere('description','LIKE','%'.$search.'%')
                    ->orderBy('date_issuance','asc')
                    ->paginate(6);

        return view('quote.index', compact('quotes','search'));
            // ->with('i', (request()->input('page', 1) - 1) * $quotes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quote = new Quote();
        $detailQuote = new DetailQuote() ;
        $persons = Person::pluck( 'id_card','id');
        $services = Service::pluck('name','id');
        $products = Product::pluck('name','id');
        $projects = Project::pluck('name','id');
        $quotes = Quote::pluck('description','id');
        $quote->date_issuance = now()->format('Y-m-d');
        return view('quote.create', compact('quote','detailQuote','persons','services','products','projects','quotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    request()->validate(Quote::$rules);

    $quote = Quote::create($request->all());
    $detailQuote = new DetailQuote() ;
    $quote->date_issuance = now()->format('Y-m-d');
    $servicesId = $request->input('services_id');
    $productsId = $request->input('products_id');
    $projectsId = $request->input('projects_id');
    $quotesId = $request->input('quotes_id');

    // // Comprobar que los valores existen en las tablas correspondientes
    // $existsServices = Product::find($servicesId);
    // $existsProducts = Service::find($productsId);
    // $existsProjects = Project::find($projectsId);
    // $existsQuotes = Quote::find($quotesId);

    // if ($existsServices && $existsProducts && $existsProjects && $existsQuotes) {
    //     $detailCuote = new DetailQuote([
    //         'services_id' => $servicesId,
    //         'products_id' => $productsId,
    //         'projects_id' => $projectsId,
    //         'quotes_id' => $quotesId,
    //     ]);
    //     $quote->detailQuotes()->save($detailCuote);
    // }
    //     return redirect()->route('quotes.index')
    //         ->with('success', 'Cotización creada correctamente.');
   
    // Crear los detalles de la cotización
    if ($request->has('services_id')) {
        foreach ($request->services_id as $key => $serviceId) {
            $detalle = new DetailQuote([
                'services_id' => $serviceId,
                'products_id' => $request->products_id[$key],
                'projects_id' => $request->projects_id[$key],
                'quotes_id' => $request->quotes_id[$key],
                // Agrega aquí los demás campos necesarios para los detalles de la cotización
            ]);
            $quote->detailQuotes()->save($detalle);
        }
    }

    return redirect()->route('quotes.index')->with('success', 'Cotización creada correctamente.');
    
}

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote = Quote::find($id);
        $detailQuote = DetailQuote::where('quotes_id', $quote->id)->get();
        $detailQuote = $quote->detailQuotes;
        $quote->load('detailQuotes');
        return view('quote.show', compact('quote', 'detailQuote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quote::find($id);
        $detailQuote = new DetailQuote() ;
        $persons = Person::pluck( 'id_card','id');
        $services = Service::pluck('name','id');
        $products = Product::pluck('name','id');
        $projects = Project::pluck('name','id');
        $quotes = Quote::pluck('description','id');
        $quote->date_issuance = now()->format('Y-m-d');
        return view('quote.create', compact('quote','detailQuote','persons','services','products','projects','quotes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        $area=[
            'date_issuance'=>'required|date',
            'description'=>'required|string|max:300',
            'total'=>'required|number|max:50',
            'discount'=>'required|text|max:50',
            'status'=>'required|select',
            'people'=>'required|select',
            'services_id'=>'required|select',
            'products_id'=>'required|select',
            'projects_id'=>'required|select',
            'quotes_id'=>'required|select',
        ];
        $messaje=[
            'required'=>'El atributo es requerido',
            'max'=>'No puede ingresar mas caracteres en este campo',
        ];
        $this->validate($request, $area, $messaje);

        request()->validate(Quote::$rules);

        $quote->update($request->all());

        return redirect()->route('quotes.index')
            ->with('success', 'Quote updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $quote = Quote::find($id)->delete();

        return redirect()->route('quotes.index')
            ->with('success', 'Quote deleted successfully');
    }
    
    public function generatePDF(Request $request)
    {
        
        // $quote = new Quote();
        // $detailQuote = new DetailQuote();  
        
        // return view('quote.pdf-template', compact('quote','detailQuote')); <td>{{ $detailQuote ? $detailQuote->service->name : 'N/A' }} </td>
        // Obtener el filtro de la solicitud
        $filter = $request->input('findId');
        
        // Obtener los datos de las personas filtradas si se aplicó un filtro
        if ($filter) {
            $quote = Quote::where('id', $filter)->get();
            
        } else {
            // Si no hay filtro, obtener todas las personas
            $quote = Quote::all();
        }
        // Pasar los datos a la vista pdf-template
        $data = [
            'quote' => $quote
        ];   

        // Generar el PDF
        $pdf = new DompdfDompdf();
        $pdf->loadHtml(view('quote.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('document.pdf');
    }


}