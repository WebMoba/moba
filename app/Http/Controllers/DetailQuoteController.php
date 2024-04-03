<?php

namespace App\Http\Controllers;

use App\Models\DetailQuote;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Service;
use App\Models\Product;
use App\Models\Quote;

/**
 * Class DetailQuoteController
 * @package App\Http\Controllers
 */
class DetailQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailQuotes = DetailQuote::paginate(1);

        return view('detail-quote.index', compact('detailQuotes'))
            ->with('i', (request()->input('page', 1) - 1) * $detailQuotes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailQuote = new DetailQuote();
        $services = Service::pluck('name','id');
        $products = Product::pluck('name','id');
        $projects = Project::pluck('name','id');
        $quotes = Quote::pluck('description','id');
        return view('detail-quote.create', compact('detailQuote', 'services', 'products', 'projects', 'quotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area=[
            'services_id'=>'required|select',
            'products_id'=>'required|select',
            'projects_id'=>'required|select',
            'quotes_id'=>'required|select',
        ];
        $msj=[
            'required'=>'El atributo es requerido',
        ];
        $this->validate($request, $area,$msj);

        request()->validate(DetailQuote::$rules);

        $detailQuote = DetailQuote::create($request->all());

        return redirect()->route('detail-quotes.index')
            ->with('success', 'DetailQuote created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailQuote = DetailQuote::find($id);

        return view('detail-quote.show', compact('detailQuote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailQuote = DetailQuote::find($id);

        return view('detail-quote.edit', compact('detailQuote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetailQuote $detailQuote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailQuote $detailQuote)
    {
        $area=[
            'services_id'=>'required|select',
            'products_id'=>'required|select',
            'projects_id'=>'required|select',
            'quotes_id'=>'required|select',
        ];
        $msj=[
            'required'=>'El atributo es requerido',
        ];
        $this->validate($request, $area,$msj);

        request()->validate(DetailQuote::$rules);

        $detailQuote->update($request->all());

        return redirect()->route('detail-quotes.index')
            ->with('success', 'DetailQuote updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detailQuote = DetailQuote::find($id)->delete();

        return redirect()->route('detail-quotes.index')
            ->with('success', 'DetailQuote deleted successfully');
    }
}
