<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf as DompdfDompdf;

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
        
        // $area=[
        //     'name'=>'required|string|max:100',
        //     'description'=>'required|string|max:300',
        //     'date_start'=>'required|date',
        //     'date_end'=>'required|text',
        //     'status'=>'required|select',
        // ];
        // $msj=[
        //     'required'=>'El atributo es requerido',
        //     'max'=>'No puede ingresar mas caracteres en este campo',
        // ];
        // $this->validate($request, $area, $msj);

        request()->validate(Project::$rules);

        $project = Project::create($request->all());

        $project->date_start = now()->format('Y-m-d');
        $project->date_end = now()->format('Y-m-d');
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
        // $area=[
        //     'name'=>'required|string|max:100',
        //     'description'=>'required|string|max:300',
        //     'date_start'=>'required|date',
        //     'date_end'=>'required|date',
        //     'status'=>'required|select',
        // ];
        // $msj=[
        //     'required'=>'El atributo es requerido',
        //     'max'=>'No puede ingresar mas caracteres en este campo',
        // ];
        // $this->validate($request, $area, $msj);
        
        request()->validate(Project::$rules);

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
        $project = Project::find($id)->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto borrado con éxito');
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
        return $pdf->stream('document.pdf');
    }

}

