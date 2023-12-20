<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

/**
 * Class UnitController
 * @package App\Http\Controllers
 */
class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::paginate();

        return view('unit.index', compact('units'))
            ->with('i', (request()->input('page', 1) - 1) * $units->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = new Unit();
        $unit->unit_type = str_replace(['Docena', 'Centena', 'Mil'], ['docena', 'centena', 'mil'], $unit->unit_type);
        $unit->size = str_replace(['Cm', 'M'], ['cm', 'm'], $unit->size);
        $unit->area = str_replace(['M2'], ['m2'], $unit->area);
        return view('unit.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessages = ['required' => 'El campo es obligatorio.',];

        request()->validate(Unit::$rules, $customMessages);

        $unit = Unit::create($request->all());

        return redirect()->route('unit.index')
            ->with('success', 'Unidad creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::find($id);

        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::find($id);
        $unit->unit_type = str_replace(['Docena', 'Centena', 'Mil'], ['docena', 'centena', 'mil'], $unit->unit_type);
        $unit->size = str_replace(['Cm', 'M'], ['cm', 'm'], $unit->size);
        $unit->area = str_replace(['M2'], ['m2'], $unit->area);
        return view('unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        request()->validate(Unit::$rules);

        $unit->update($request->all());

        return redirect()->route('unit.index')
            ->with('success', 'Unidad editada exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Buscar la unidad por su ID
        $unit = Unit::find($id);

        // Verificar si la unidad existe
        if (!$unit) {
            return redirect()->route('unit.index')->with('error', 'Unidad no encontrada.');
        }

        // Verificar si hay productos asociados a esta unidad
        if ($unit->products->isNotEmpty()) {
            // Mostrar mensaje de error si hay productos asociados
            return redirect()->route('unit.index')->with('error', 'No se puede eliminar la unidad porque tiene productos asociados.');
        }

        // Eliminar la unidad
        $unit->delete();

        return redirect()->route('unit.index')->with('success', 'Unidad eliminada exitosamente.');
    }
}
