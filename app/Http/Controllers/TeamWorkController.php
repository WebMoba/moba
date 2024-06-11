<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Exports\TeamWorkExport;
use App\Models\Project;
use App\Models\TeamWork;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf as DompdfDompdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class TeamWorkController
 * @package App\Http\Controllers
 */

class TeamWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $teamWorks = TeamWork::with('project')
            ->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('specialty', 'LIKE', '%' . $search . '%')
            ->orderBy('assigned_date', 'asc')
            ->paginate(5);

        return view('team-work.index', compact('teamWorks', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $teamWorks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teamWork = new TeamWork();
        $projects = Project::pluck('name', 'id');
        $teamWork->assigned_date = now()->format('Y-m-d');
        $editing = false;

        return view('team-work.create', compact('teamWork', 'editing', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msj = [
            'required' => 'El atributo es requerido',
            'max' => 'No puede ingresar mas caracteres en este campo',
            'string' => 'El campo debe ser una cadena de texto.',
            'date' => 'El campo no debe ser una fecha anterior al dia de Hoy.',
        ];

        $request->validate([
            'name' => 'required|string|max:10',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:100000',
            'specialty' => 'required|string|max:100',
            'assigned_work' => 'required|string|max:100',
            'assigned_date' => 'required|date',
            'description' => 'required|string|max:1000',
            'projects_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:100000',

        ], $msj);

        $teamWork = new TeamWork($request->except(['image']));
        
        if ($request->hasFile('image')) {
            $teamWork->image = $request->file('image')->store('uploads', 'public');
        }else {
            return redirect()->back()->withErrors(['image' => 'El campo imagen es obligatorio'])->withInput();
        }
        $teamWork->save();


        return redirect()->route('team-works.index')
            ->with('success', 'Equipo de trabajo creado de forma exitosa.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teamWork = TeamWork::find($id);
        $projects = Project::pluck('name', 'id');
        return view('team-work.show', compact('teamWork', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teamWork = TeamWork::find($id);

        // Verificar si el registro existe
        if (!$teamWork) {
            return redirect()->route('team-works.index')->with('error', 'Equipo de trabajo no encontrado');
        }

        $teamWork->assigned_date = optional($teamWork->assigned_date)->format('Y-m-d');
        $projects = Project::pluck('name', 'id');
        $editing = true;

        return view('team-work.edit', compact('teamWork', 'editing', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TeamWork $teamWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamWork $teamWork)
    {
        $msj = [
            'required' => 'El atributo es requerido',
            'max' => 'No puede ingresar más caracteres en este campo',
            'string' => 'El campo debe ser una cadena de texto.',
            'date' => 'El campo no debe ser una fecha anterior al día de hoy.',
        ];
    
        $request->validate([
            'specialty' => 'required|string|max:100',
            'assigned_work' => 'required|string|max:100',
            'assigned_date' => 'required|date',
            'projects_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:100000',
        ], $msj);
    
        // Agrega depuración aquí
        //\Log::info('Datos de actualización', $request->all());
    
        $teamWork->fill($request->except('image'));
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Eliminar la imagen anterior si existe
            if ($teamWork->image && Storage::disk('public')->exists($teamWork->image)) {
                Storage::disk('public')->delete($teamWork->image);
            }
    
            $teamWork->image = $request->file('image')->store('uploads', 'public');
        }
    
        $teamWork->save();
    
        return redirect()->route('team-works.index')
            ->with('success', 'Equipo de trabajo actualizado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $teamWork = TeamWork::find($id);

        if (!$teamWork) {
            return redirect()->route('team-works.index')->with('error', 'El equipo de trabajo no existe');
        }

        // Cambia el estado del proyecto
        $teamWork->disable = !$teamWork->disable;
        $teamWork->save();

        return redirect()->route('team-works.index')->with('success', 'Estado del equipo de trabajo cambiado con éxito');
    }

    public function pdf()
    {

        $teamwork = TeamWork::all();
        $project = Project::all();
        $pdf = Pdf::loadView('team-work.pdf-template', ['teamwork' => $teamwork], ['project' => $project])
            ->setPaper('a4', 'landscape');

        $pdf->set_option('isRemoteEnabled', true);

        return $pdf->download('Listado Ventas.pdf');
    }

    public function generatePDF(Request $request)
    {
        // Obtener el filtro de la solicitud
        $filter = $request->input('findId');

        // Obtener los datos de las personas filtradas si se aplicó un filtro
        if ($filter) {
            $teamwork = Teamwork::where('id', $filter)->get();

        } else {
            // Si no hay filtro, obtener todas las personas
            $teamwork = Teamwork::all();
        }
        // Pasar los datos a la vista pdf-template
        $data = [
            'teamwork' => $teamwork,
        ];

        // Generar el PDF
        $pdf = new DompdfDompdf();
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->loadHtml(view('team-work.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Listado_Equipos_De_Trabajo.pdf');
    }

    public function export()
    {
        return Excel::download(new TeamWorkExport, 'Listado_Equipos-De-Trabajo.xlsx');
    }

    public function equipo(Request $request)
    {
        $search = trim($request->get('search'));
        $teamWorks = TeamWork::with('project')
            ->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('specialty', 'LIKE', '%' . $search . '%')
            ->orderBy('assigned_date', 'asc')
            ->paginate(10);

        return view('mobaMenu.EquipoTrabajo.index', compact('teamWorks', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $teamWorks->perPage());
    }

    public function image($id)
    {
        $teamWork = TeamWork::find($id);
        return asset('storage/' . $teamWork->image);
    }

}
