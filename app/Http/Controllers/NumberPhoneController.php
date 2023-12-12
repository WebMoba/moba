<?php

namespace App\Http\Controllers;

use App\Models\NumberPhone;
use Illuminate\Http\Request;

/**
 * Class NumberPhoneController
 * @package App\Http\Controllers
 */
class NumberPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberPhones = NumberPhone::paginate();

        return view('number-phone.index', compact('numberPhones'))
            ->with('i', (request()->input('page', 1) - 1) * $numberPhones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $numberPhone = new NumberPhone();
        return view('number-phone.create', compact('numberPhone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(NumberPhone::$rules);

        $numberPhone = NumberPhone::create($request->all());

        return redirect()->route('number-phones.index')
            ->with('success', 'NumberPhone created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $numberPhone = NumberPhone::find($id);

        return view('number-phone.show', compact('numberPhone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $numberPhone = NumberPhone::find($id);

        return view('number-phone.edit', compact('numberPhone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  NumberPhone $numberPhone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberPhone $numberPhone)
    {
        request()->validate(NumberPhone::$rules);

        $numberPhone->update($request->all());

        return redirect()->route('number-phones.index')
            ->with('success', 'NumberPhone updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $numberPhone = NumberPhone::find($id)->delete();

        return redirect()->route('number-phones.index')
            ->with('success', 'NumberPhone deleted successfully');
    }
}
