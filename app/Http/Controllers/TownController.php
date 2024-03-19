<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

/**
 * Class TownController
 * @package App\Http\Controllers
 */
class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towns = Town::paginate();

        return view('town.index', compact('towns'))
            ->with('i', (request()->input('page', 1) - 1) * $towns->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $town = new Town();
        return view('town.create', compact('town'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Town::$rules);

        $town = Town::create($request->all());

        return redirect()->route('towns.index')
            ->with('success', 'Town created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $town = Town::find($id);

        return view('town.show', compact('town'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $town = Town::find($id);

        return view('town.edit', compact('town'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Town $town
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Town $town)
    {
        request()->validate(Town::$rules);

        $town->update($request->all());

        return redirect()->route('towns.index')
            ->with('success', 'Town updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $town = Town::find($id)->delete();

        return redirect()->route('towns.index')
            ->with('success', 'Town deleted successfully');
    }

    
}
