<?php

namespace App\Http\Controllers;
use App\Models\TeamWork;
use App\Models\User;
use App\Models\Region;
use App\Models\Town;
use App\Models\NumberPhone;
use Dompdf\Dompdf;
use Dompdf\Options;

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
        $people = Person::orderBy('created_at','desc')->paginate();

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
        
        
        $regions = Region::pluck('name', 'id');
        $usersName = User::pluck('name', 'id');
        $teamWorks = TeamWork::pluck('assigned_work', 'id');
        $users = User::pluck('email', 'id');
        $towns = Town::pluck('name','id');
        $numberPhones = NumberPhone::pluck('number','id');
        $roles = ['Administrador' => 'Administrador', 'Cliente' => 'Cliente', 'Proveedor' => 'Proveedor'];
        $identificationTypes = ['cedula' => 'Cedula', 'cedula Extranjeria' => 'Cedula Extranjeria', 'NIT' => 'NIT'];


        return view('person.create', compact('person', 'teamWorks', 'users', 'towns', 'numberPhones', 'usersName', 'regions', 'roles', 'identificationTypes' ));
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
            'team_works_id' => 'required',
            'number_phones_id' => 'required',
            'region' => 'required',
            'towns_id' => 'required',
            'users_id' => 'required',
            'rol' => 'required',
            'identification_type'=>'required',
            'user_name' =>'required',
        ], $customMessages);

        request()->validate(Person::$rules);

       
        // Crear una nueva instancia de Persona y asignar los valores del formulario
        $person = new Person();
        $person->id_card = $request->input('id_card');
        $person->name = $request->input('user_name');
        $person->team_works_id = $request->input('team_works_id');
        $person->number_phones_id = $request->input('number_phones_id');
        $person->addres = $request->input('addres');
        $person->region_id = $request->input('region');
        $person->towns_id = $request->input('towns_id');
        $person->users_id = $request->input('users_id');
        $person->rol = $request->input('rol');
        $person->identification_type =$request->input('identification_type');
        // Asigna los valores para otros campos según sea necesario

        // Guardar la persona en la base de datos
        $person->save();

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
    // Recuperar los datos de la persona junto con sus relaciones
    $person = Person::with('teamWork', 'numberPhone', 'town')->find($id);

    // Verificar si la persona existe
    if (!$person) {
        // Manejar el caso en que la persona no existe, por ejemplo, redirigir a una página de error 404
        abort(404);
    }

    // Devolver la vista con los datos de la persona
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
        // Obtener la persona a editar
        $person = Person::find($id);
        
        // Obtener listas de selección para otros campos
        $teamWorks = TeamWork::pluck('assigned_work', 'id');
        $regions = Region::pluck('name', 'id');
        $usersName = User::pluck('name', 'id');
        $users = User::pluck('email', 'id');
        $towns = Town::pluck('name','id');
        $numberPhones = NumberPhone::pluck('number','id');
    
        // Pasar los datos a la vista de edición
        return view('person.edit', compact('person', 'teamWorks', 'users', 'towns', 'numberPhones', 'usersName', 'regions'));
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
    // Encuentra y elimina la persona con el ID dado
    $person = Person::find($id);
    if (!$person) {
        return redirect()->route('person.index')->with('error', 'La persona no existe');
    }
    $person->delete();
    
    // Luego, busca y elimina el registro de número de teléfono asociado a esa persona
    $numberPhoneId = $person->number_phones_id;
    NumberPhone::where('id', $numberPhoneId)->delete();

    return redirect()->route('person.index')->with('success', 'Persona y su número de teléfono asociado eliminados con éxito');
}

public function generatePDF(Request $request)
{
    // Obtener el filtro de la solicitud
    $filter = $request->input('findId');
    
    // Obtener los datos de las personas filtradas si se aplicó un filtro
    if ($filter) {
        $people = Person::where('id_card', $filter)->get();
        
    } else {
        // Si no hay filtro, obtener todas las personas
        $people = Person::all();
    }
    // Pasar los datos a la vista pdf-template
    $data = [
        'people' => $people
    ];
    

    // Generar el PDF
    $pdf = new Dompdf();
    $pdf->loadHtml(view('person.pdf-template', $data));

    $pdf->setPaper('A4', 'portrait');

    $pdf->render();

    return $pdf->stream('document.pdf');
    
    
}
public function getTownsByRegion(Request $request)
{
    $regionId = $request->input('regions_id'); // Cambiado de 'region_id' a 'regions_id'
    $towns = Town::where('regions_id', $regionId)->pluck('name', 'id');
    return response()->json($towns);
}

}