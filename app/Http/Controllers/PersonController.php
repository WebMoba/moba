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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PeopleExport;





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
        


        $people = Person::orderBy('created_at', 'desc')->paginate(10);

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
            'max:10', // Máximo 10 caracteres
            Rule::unique('people', 'id_card')->ignore($request->id),
        ],
        'user_name' => 'required',
        
        'phone_number' => ['required', 'max:10'], // Asegúrate de que el campo del número de teléfono esté presente en la solicitud
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
        // Lógica para mostrar los detalles de una persona por su ID
        $person = Person::findOrFail($id);

        // Retornar la vista con los detalles de la persona
        return view('person.show', compact('person'));
    }



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
    $request->validate([
        'rol' => ['required', Rule::in(['Administrador', 'Cliente', 'Proveedor'])], // Asegúrate de que los valores de 'rol' sean válidos
        'id_card' => 'required',
        'identification_type' => ['required', Rule::in(['cedula', 'cedula Extranjeria', 'NIT'])],
        'addres' => 'required',
        'phone_number' => 'required',
        'region' => 'required', // Asegúrate de que el campo 'region' esté presente en la solicitud
        'towns_id' => 'required',
        'user_name' => 'required',
    ]);
    $regionId = $request->input('region');

   

    // Actualizar los datos de la persona
    $person->update([
        'name' => $request->input('user_name'),
        'addres'=> $request->input('addres'),
        'team_works_id' => $request->input('team_works_id'),
        'phone_number' => $request->input('phone_number'),
        'region_id' => $request->input('region'),
        'towns_id' => $request->input('towns_id'),
        'users_id' =>$request->input('users_id'),


       $person->rol = $request->input('rol'), // Actualizar el campo 'rol' con el valor de la solicitud
       $person->identification_type = $request->input('identification_type'),
       $person->region_id = $request->input('region'),
        // Otras asignaciones de datos...
    ]);
   
    // Actualizar el número de teléfono asociado a la persona si se ha cambiado en el formulario
    if ($request->has('phone_number')) {
        $person->numberPhone->update(['number' => $request->input('phone_number')]);
    }


        return redirect()->route('person.index')
            ->with('success', 'Persona actualizada exitosamente');
    }

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


    public function getTownsByRegion(Request $request)
{
    $regionId = $request->input('regions_id'); // Cambiado de 'region_id' a 'regions_id'
    $towns = Town::where('regions_id', $regionId)->pluck('name', 'id');
    return response()->json($towns);
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



    public function export()
    {
        return Excel::download(new PeopleExport, 'people.xlsx');
    }
}
