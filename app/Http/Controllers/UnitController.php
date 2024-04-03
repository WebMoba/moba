<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use App\Models\MaterialsRaw;
use App\Models\Product;
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

        $search = request()->input('search');

        if (!empty($search)) {
            $units = Unit::where('unit_type', 'like', '%' . $search . '%')
                ->paginate();
        } else {
            $units = Unit::paginate();
        }

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
        $unit->unit_type = str_replace(['Unidad', 'Docena', 'Centena', 'Mil', 'MM', 'CM', 'M', 'CM2', 'M2'], ['unidad', 'docena', 'centena', 'mil', 'mm', 'cm', 'm', 'cm2', 'm2'], $unit->unit_type);
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
        $unit->unit_type = str_replace(['Unidad', 'Docena', 'Centena', 'Mil', 'MM', 'CM', 'M', 'CM2', 'M2'], ['unidad', 'docena', 'centena', 'mil', 'mm', 'cm', 'm', 'cm2', 'm2'], $unit->unit_type);
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
        $unit = Unit::find($id);

        if (!$unit) {
            return redirect()->route('unit.index')->with('error', 'Unidad no encontrada.');
        }
        $materialsRaws = $unit->materialsRaws();

        if ($unit->products()->exists() || $materialsRaws->exists()) {
            return redirect()->route('unit.index')->with('warning', 'Esta unidad esta asociada a un producto o materia prima.');
        }

        $unit->delete();

        return redirect()->route('unit.index')->with('success', 'Unidad eliminada exitosamente.');
    }
    public function generatePDF(Request $request)
    {
        // Obtener el filtro de la solicitud
        $filter = $request->input('findId');

        // Obtener los datos de las personas filtradas si se aplicó un filtro
        if ($filter) {
            $units = Unit::where('unit_type', $filter)->get();
        } else {
            // Si no hay filtro, obtener todas las personas
            $units = Unit::all();
        }
        // Pasar los datos a la vista pdf-template
        $data = [
            'units' => $units
        ];

        // Generar el PDF
        $pdf = new Dompdf();
        $pdf->loadHtml(view('unit.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Unidades.pdf');
    }
}
