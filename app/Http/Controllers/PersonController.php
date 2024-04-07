<?php

namespace App\Http\Controllers;
use App\Models\TeamWork;
use App\Models\User;
use App\Models\Region;
use App\Models\Town;
use App\Models\NumberPhone;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Validation\Rule;




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
        $people = Person::orderBy('created_at','desc')->paginate(10);

        return view('person.index', compact('people'))
            ->with('i', (request()->input('page', 1) - 1) * $people->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
{
    $person = new Person();
    
    $person->disable = false;
    
    // Obtener listas de datos necesarios para los campos select en el formulario
    $regions = Region::pluck('name', 'id');
    $usersName = User::pluck('name', 'id');
    $teamWorks = TeamWork::pluck('assigned_work', 'id');
    $users = User::pluck('email', 'id');
    $towns = Town::pluck('name', 'id');
    $numberPhones = NumberPhone::pluck('number', 'id');
    
    // Definir opciones para roles y tipos de identificación
    $roles = ['Administrador' => 'Administrador', 'Cliente' => 'Cliente', 'Proveedor' => 'Proveedor'];
    $identificationTypes = ['cedula' => 'Cedula', 'cedula Extranjeria' => 'Cedula Extranjeria', 'NIT' => 'NIT'];
    
    $numberPhoneId = request('numberPhoneId');
    
    // Obtener el número de teléfono correspondiente al ID seleccionado
    $numberPhone = NumberPhone::find($numberPhoneId);
    
    return view('person.create', compact('person', 'teamWorks', 'users', 'towns', 'numberPhones', 'usersName', 'regions', 'roles', 'identificationTypes', 'numberPhoneId', 'numberPhone'));
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
        'id_card.unique' => 'El número de identificación ya está en uso',
        'users_id.unique' => 'El correo electrónico ya está en uso',
    ];

    $request->validate([
        'id_card' => [
            'required',
            Rule::unique('people', 'id_card')->ignore($request->id),
        ],
        'user_name' => 'required',
        'team_works_id' => 'required',
        'phone_number' => 'required', 
        'numberPhone' => 'required',
        'numberPhones'=>'required',
        'numberPhoneId'=>'required',// Asegúrate de que el campo del número de teléfono esté presente en la solicitud
        'region' => 'required',
        'towns_id' => 'required',
        'users_id' => [
            'required',
            Rule::unique('people', 'users_id')->ignore($request->id),
        ],
        'rol' => 'required',
        'identification_type' => 'required',
    ], $customMessages);


    
    // Crear el número telefónico
    $numberPhone = NumberPhone::create([
        'number' => $request->input('phone_number')
    ]);

    // Crear la persona y asignar el ID del número telefónico
    $person = new Person();
    $person->id_card = $request->input('id_card');
    $person->name = $request->input('user_name');
    $person->team_works_id = $request->input('team_works_id');
    $person->number_phones_id = $numberPhone->id; // Asignar el ID del número telefónico
    $person->addres = $request->input('addres');
    $person->region_id = $request->input('region');
    $person->towns_id = $request->input('towns_id');
    $person->users_id = $request->input('users_id');
    $person->rol = $request->input('rol');
    $person->identification_type = $request->input('identification_type');

    $person->disable = false;

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
    
    // Obtener el número de teléfono asociado a la persona
    $numberPhoneId = $person->number_phones_id;
    $numberPhone = NumberPhone::find($numberPhoneId);
   
    // Obtener listas de selección para otros campos
    $usersName = User::pluck('name', 'id');
    $teamWorks = TeamWork::pluck('assigned_work', 'id');

    
    $regions = Region::pluck('name', 'id');


    $towns = Town::pluck('name','id');
    $users = User::pluck('email', 'id');

    // Pasar los datos a la vista de edición
    return view('person.edit', compact('person', 'teamWorks', 'users', 'towns', 'numberPhone', 'usersName', 'regions', 'numberPhoneId'));
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
    // Validar la solicitud
 
        
        $customMessages = [
            'required' => 'El campo es obligatorio.',
            'id_card.unique' => 'El número de identificación ya está en uso',
            'users_id.unique' => 'El correo electrónico ya está en uso',
        ];
    
        $request->validate([
           
            'user_name' => 'required',
            'team_works_id' => 'required',
            'phone_number' => 'required', // Asegúrate de que el campo del número de teléfono esté presente en la solicitud
            'region' => 'required',
            'towns_id' => 'required',
            'rol' => 'required',
            'identification_type' => 'required',
        ], $customMessages);


    

    // Actualizar los datos de la persona
    $person->update($request->all());

    // Actualizar el número de teléfono asociado a la persona si se ha cambiado en el formulario
    if ($request->has('phone_number')) {
        $numberPhoneId = $person->number_phones_id;
        $numberPhone = NumberPhone::find($numberPhoneId);
        $numberPhone->update(['number' => $request->phone_number]);
    }

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
        // Encuentra la persona con el ID dado
        $person = Person::find($id);
        if (!$person) {
            return redirect()->route('person.index')->with('error', 'La persona no existe');
        }
    
        // Cambia el estado de la persona
        $person->disable = !$person->disable;
        $person->save();
    
        return redirect()->route('person.index')->with('success', 'Estado de la persona cambiado con éxito');
    }

public function generatePDF(Request $request)
{
    // Obtener el filtro de la solicitud
    $filter = $request->input('findId');
    
    // Obtener los datos de las personas filtradas si se aplicó un filtro
    $people = Person::query();

    if ($filter) {
        $people->where('id_card', 'LIKE', "%$filter%");
    }

    $people = $people->get();
    
    // Pasar los datos filtrados a la vista pdf-template
    $data = [
        'people' => $people
    ];

    // Generar el PDF
    $pdf = new Dompdf();
    $pdf->loadHtml(view('person.pdf-template', $data));

    $pdf->setPaper('A4', 'portrait');
    $pdf->render();

    return $pdf->stream('Personas.pdf');
}

public function getTownsByRegion(Request $request)
{
    $regionId = $request->input('regions_id'); // Cambiado de 'region_id' a 'regions_id'
    $towns = Town::where('regions_id', $regionId)->pluck('name', 'id');
    return response()->json($towns);
}

}