<?php

namespace App\Http\Controllers;

use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf as DompdfDompdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Exports\ProjectExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function index()
    {
        $projects = Project::paginate(10);
        return view('project.index', compact('projects'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        $editing = false;

        return view('project.create', compact('project', 'editing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'status' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageOne' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageTwo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageThree' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = new Project($request->all());

        if ($request->hasFile('logo')) {
            $project->logo = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('imageOne')) {
            $project->imageOne = $request->file('imageOne')->store('images', 'public');
        }

        if ($request->hasFile('imageTwo')) {
            $project->imageTwo = $request->file('imageTwo')->store('images', 'public');
        }

        if ($request->hasFile('imageThree')) {
            $project->imageThree = $request->file('imageThree')->store('images', 'public');
        }

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Proyecto creado exitosamente.');
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
        $editing = true;

        return view('project.edit', compact('project', 'editing'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'status' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageOne' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageTwo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageThree' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project->fill($request->all());

        if ($request->hasFile('logo')) {
            $project->logo = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('imageOne')) {
            $project->imageOne = $request->file('imageOne')->store('images', 'public');
        }

        if ($request->hasFile('imageTwo')) {
            $project->imageTwo = $request->file('imageTwo')->store('images', 'public');
        }

        if ($request->hasFile('imageThree')) {
            $project->imageThree = $request->file('imageThree')->store('images', 'public');
        }

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Proyecto actualizado exitosamente.');
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

    public function pdf()
    {

        $project = Project::all();

        $pdf = Pdf::loadView('project.pdf-template', ['project' => $project])
                    ->setPaper('a4','portrait');

        $pdf->set_option('isRemoteEnabled', true);

        return $pdf->download('Listado Proyectos.pdf');
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
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->loadHtml(view('project.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Listado_Proyectos.pdf');
    }

    public function export()
    {
        return Excel::download(new ProjectExport, 'Listado_Proyectos.xlsx');
    }

}

