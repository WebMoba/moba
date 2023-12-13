<?php

namespace App\Http\Controllers;
use App\Models\TeamWork;
use App\Models\User;
use App\Models\Town;
use App\Models\NumberPhone;

use App\Models\Person;
use Illuminate\Http\Request;

/**
 * Class PersonController
 * @package App\Http\Controllers
 */
class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::paginate();

        return view('person.index', compact('people'))
            ->with('i', (request()->input('page', 1) - 1) * $people->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $person = new Person();
        $teamWorks = TeamWork::pluck('assigned_work', 'id');
        $users = User::pluck('email', 'id');
        $towns = Town::pluck('name','id');
        $numberPhones = NumberPhone::pluck('number','id');
        return view('person.create', compact('person', 'teamWorks', 'users', 'towns', 'numberPhones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessages = [
            'required' => 'El campo es obligatorio.',
           
        ];
        $request->validate([
            'id_card' => 'required',
            'addres' => 'required',
            'team_works_id' => 'required',
            'number_phones_id' => 'required',
            'towns_id' => 'required',
            'users_id' => 'required',
        ], $customMessages);

        request()->validate(Person::$rules);

        $person = Person::create($request->all());

        return redirect()->route('person.index')
            ->with('success', 'Persona creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);

        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::find($id);
        $person = new Person();
        $teamWorks = TeamWork::pluck('assigned_work', 'id');
        $users = User::pluck('email', 'id');
        $towns = Town::pluck('name','id');
        $numberPhones = NumberPhone::pluck('number','id');
        return view('person.create', compact('person', 'teamWorks', 'users', 'towns', 'numberPhones'));

        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        request()->validate(Person::$rules);

        $person->update($request->all());

        return redirect()->route('person.index')
            ->with('success', 'Persona actualizada exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $person = Person::find($id)->delete();

        return redirect()->route('person.index')
            ->with('success', 'Person deleted successfully');
    }
}