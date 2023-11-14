<?php

namespace App\Http\Controllers;

use App\Models\DetailQuote;
use Illuminate\Http\Request;

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
        $detailQuotes = DetailQuote::paginate();

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
        return view('detail-quote.create', compact('detailQuote'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
