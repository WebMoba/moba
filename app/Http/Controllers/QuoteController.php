<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

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
    public function index()
    {
        $quotes = Quote::paginate();

        return view('quote.index', compact('quotes'))
            ->with('i', (request()->input('page', 1) - 1) * $quotes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quote = new Quote();
        return view('quote.create', compact('quote'));
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

        return redirect()->route('quotes.index')
            ->with('success', 'Quote created successfully.');
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

        return view('quote.show', compact('quote'));
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

        return view('quote.edit', compact('quote'));
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
}
