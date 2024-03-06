<?php

namespace App\Http\Controllers;

use App\Models\TeamWork;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

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
        $teamWorks=TeamWork::with('project')
                    ->where('id','LIKE','%'.$search.'%')
                    ->orWhere('specialty','LIKE','%'.$search.'%')
                    ->orderBy('assigned_date','asc')
                    ->paginate(10);

        return view('team-work.index', compact('teamWorks','search'));
            // ->with('i', (request()->input('page', 1) - 1) * $teamWorks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teamWork = new TeamWork();
        $projects = Project::pluck('name','id');
        $teamWork -> assigned_date = now()->format('Y-m-d');
        return view('team-work.create', compact('teamWork','projects'));
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
        //     'specialty'=>'required|string|max:100',
        //     'assigned_work'=>'required|string|max:100',
        //     'project'=>'required|select',
        // ];
        // $msj=[
        //     'required'=>'El atributo es requerido',
        //     'max'=>'No puede ingresar mas caracteres en este campo',
        // ];
        // $this->validate($request, $area,$msj);

        request()->validate(TeamWork::$rules);

        $teamWork = TeamWork::create($request->all());

        return redirect()->route('team-works.index')
            ->with('success', 'Equipo de trabajo creado de forma satisfactoria.');
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
        $projects = Project::pluck('name','id');
        return view('team-work.show', compact('teamWork','projects'));
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
        $projects = Project::pluck('name','id');
        return view('team-work.edit', compact('teamWork','projects'));
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
        // $area=[
        //     'specialty'=>'required|string|max:100',
        //     'assigned_work'=>'required|string|max:100',
        //     'assigned_date'=>'required|date',
        //     'project'=>'required|select',
        // ];
        // $msj=[
        //     'required'=>'El atributo es requerido',
        //     'max'=>'No puede ingresar mas caracteres en este campo',
        // ];
        // $this->validate($request, $area,$msj);

        request()->validate(TeamWork::$rules);

        $teamWork->update($request->all());
        
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
        $teamWork = TeamWork::find($id)->delete();

        return redirect()->route('team-works.index')
            ->with('success', 'Equipo de trabajo actualizado con éxito');
    }
}

