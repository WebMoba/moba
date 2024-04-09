<?php

namespace App\Http\Controllers;

use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf as DompdfDompdf;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Class ProjectController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $projects=DB::table('projects')
                    ->select('id','name','description','date_start','date_end','status')
                    ->where('id','LIKE','%'.$search.'%')
                    ->orWhere('name','LIKE','%'.$search.'%')
                    ->orderBy('date_start','asc')
                    ->paginate(4);

        return view('project.index', compact('projects','search')) ;
            // ->with('i', (request()->input('page', 1) - 1) * $projects->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        // $proyect->disable=false;
        $project->date_start = now()->format('Y-m-d');
        $project->date_end = now()->format('Y-m-d');
        return view('project.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msj=[
            'date_end.after_or_equal' => 'La fecha de finalización debe ser igual o posterior a la fecha de inicio.',
            'required'=>'El atributo es requerido',
            'max'=>'No puede ingresar mas caracteres en este campo',
            'string' => 'El campo debe ser una cadena de texto.',
            'date' => 'El campo no debe ser una fecha anterior al dia de Hoy.',
        ];

        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:300',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'status' => 'required|in:en curso,finalizado,pausado,pendiente',
        ], $msj);
        
        // request()->validate(Project::$rules);
        
        // $proyect->disable=false;
        $project = Project::create($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        $project->date_start = optional($project->date_start)->format('Y-m-d');
        $project->date_end = optional($project->date_end)->format('Y-m-d');
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $msj=[
            'date_end.after_or_equal' => 'La fecha de finalización debe ser igual o posterior a la fecha de inicio.',
            'required'=>'El atributo es requerido',
            'max'=>'No puede ingresar mas caracteres en este campo',
            'string' => 'El campo debe ser una cadena de texto.',
            'date' => 'El campo no debe ser una fecha anterior al dia de Hoy.',
        ];

        $request->validate([
            'name'=>'required|string|max:100',
            'description'=>'required|string|max:300',
            'date_start'=>'required|date',
            'date_end'=>'required|date|after_or_equal:date_start',
            'status'=>'required|select',
        ],$msj);
        
        // request()->validate(Project::$rules);

        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto actualizado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'El proyecto no existe');
        }
    
        // Cambia el estado del proyecto
        $project->disable = !$project->disable;
        $project->save();
    
        return redirect()->route('projects.index')->with('success', 'Estado del proyecto cambiado con éxito');

    }

    public function generatePDF(Request $request)
    {
        // Obtener el filtro de la solicitud
        $filter = $request->input('findId');
        
        // Obtener los datos de las personas filtradas si se aplicó un filtro
        if ($filter) {
            $project = Project::where('id', $filter)->get();
            
        } else {
            // Si no hay filtro, obtener todas las personas
            $project = Project::all();
        }
        // Pasar los datos a la vista pdf-template
        $data = [
            'project' => $project
        ];    

        // Generar el PDF
        $pdf = new DompdfDompdf();
        $pdf->loadHtml(view('project.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Listado_Proyectos.pdf');
    }

}

