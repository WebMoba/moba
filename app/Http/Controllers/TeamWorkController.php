<?php

namespace App\Http\Controllers;

use App\Models\TeamWork;
use Illuminate\Http\Request;
use App\Models\Project;

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
    public function index()
    {
        $teamWorks = TeamWork::paginate();

        return view('team-work.index', compact('teamWorks'))
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
        $projects = Project::pluck('name','id');
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

        return view('team-work.show', compact('teamWork'));
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

        return view('team-work.edit', compact('teamWork'));
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
