<?php

namespace App\Http\Controllers;

use App\Models\MaterialsRaw;
use App\Models\Unit;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

use App\Exports\MaterialsRawExport;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class MaterialsRawController
 * @package App\Http\Controllers
 */
class MaterialsRawController extends Controller
{
    public function generatePDF(Request $request)
    {
        // Obtener el filtro de la solicitud
        $filter = $request->input('findId');

        // Obtener los datos de las personas filtradas si se aplicó un filtro
        if ($filter) {
            $materials_raws = MaterialsRaw::where('id_card', $filter)->get();
        } else {
            // Si no hay filtro, obtener todas las personas
            $materials_raws = MaterialsRaw::all();
        }
        // Pasar los datos a la vista pdf-template
        $data = [
            'materials_raws' => $materials_raws,
        ];

        // Generar el PDF
        $pdf = new Dompdf();
        $pdf->loadHtml(view('materials-raw.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Registro_Materias_Primas.pdf');
    }

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
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('materials-raw.index', compact('materialsRaws', 'search'))->with('i', (request()->input('page', 1) - 1) * $materialsRaws->perPage());
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
        $editing = false;
        return view('materials-raw.create', compact('materialsRaw', 'units', 'editing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        request()->validate(MaterialsRaw::$rules);

        // Crear la materia prima con todos los datos proporcionados en la solicitud
        $materialsRaw = MaterialsRaw::create($request->all());

        // Establecer el estado de habilitación como verdadero (habilitado)
        $materialsRaw->disable = false;

        // Guardar la materia prima en la base de datos
        $materialsRaw->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('materials_raws.index')->with('success', 'Registro creado exitosamente');
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
        $editing = true;
        return view('materials-raw.edit', compact('materialsRaw', 'units', 'editing'));
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

        return redirect()->route('materials_raws.index')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Encuentra la materia prima con el ID dado
        $materialsRaw = MaterialsRaw::find($id);
        if (!$materialsRaw) {
            return redirect()->route('materials_raws.index')->with('error', 'La materia prima no existe');
        }

        // Cambia el estado de la materia prima
        $materialsRaw->disable = !$materialsRaw->disable; // Corregir a 'disabled'
        $materialsRaw->save();

        // Redirige con un mensaje de éxito
        return redirect()->route('materials_raws.index')->with('success', 'Estado de la materia prima cambiado con éxito');
    }

    public function exportToExcel()
    {
        return Excel::download(new MaterialsRawExport, 'Materia Prima.xlsx');
    }
}
