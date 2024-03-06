<?php

namespace App\Http\Controllers;

use App\Models\MaterialsRaw;
use App\Models\Unit;
use Illuminate\Http\Request;

/**
 * Class MaterialsRawController
 * @package App\Http\Controllers
 */
class MaterialsRawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = trim($request->get('search'));
        $materialsRaws = MaterialsRaw::with('unit')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('existing_quantity', 'LIKE', '%' . $search . '%')
            ->paginate(10);

        return view('materials-raw.index', compact('materialsRaws', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $materialsRaws->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materialsRaw = new MaterialsRaw();
        $units = Unit::pluck('unit_type', 'id');
        $confirm = false;
        return view('materials-raw.create', compact('materialsRaw', 'units', 'confirm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MaterialsRaw::$rules);

        $materialsRaw = MaterialsRaw::create($request->all());

        return redirect()->route('materials_raws.index')
            ->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materialsRaw = MaterialsRaw::find($id);

        return view('materials-raw.show', compact('materialsRaw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materialsRaw = MaterialsRaw::find($id);
        $units = Unit::pluck('unit_type', 'id');
        $confirm = true;
        return view('materials-raw.edit', compact('materialsRaw', 'units', 'confirm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MaterialsRaw $materialsRaw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialsRaw $materialsRaw)
    {
        request()->validate(MaterialsRaw::$rules);

        $materialsRaw->update($request->all());

        return redirect()->route('materials_raws.index')
            ->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $materialsRaw = MaterialsRaw::find($id)->delete();

        return redirect()->route('materials_raws.index')
            ->with('success', 'Registro eliminado exitosamente');
    }
}
