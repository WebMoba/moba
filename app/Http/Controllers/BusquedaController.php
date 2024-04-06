<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Person;
use App\Models\NumberPhone;
use Dompdf\Dompdf;


class BusquedaController extends Controller
{
    public function buscar(Request $request)
    {
        // Obtener el término de búsqueda del formulario
        $termino = $request->input('termino');
    
        // Realizar la consulta para buscar eventos que coincidan con el término
        $events = Event::where('place', 'LIKE', "%$termino%")
            ->orWhere('id', 'LIKE', "%$termino%")
            ->orWhere('title', 'LIKE', "%$termino%")
            ->orWhere('description', 'LIKE', "%$termino%")
            ->orWhere('importance_range', 'LIKE', "%$termino%")
            ->orWhere('date_start', 'LIKE', "%$termino%")
            ->orWhere('date_end', 'LIKE', "%$termino%")
            ->paginate();
    
        // Verificar si no se encontraron resultados
        $mensaje = $events->isEmpty() ? 'No se encontraron eventos.' : null;
    
        // Pasar los resultados de la búsqueda a la vista 'event.index' y paginarlos
        return view('event.index', compact('events', 'mensaje'))
            ->with('i', (request()->input('page', 1) - 1) * $events->perPage());
    }



    
public function buscarPeople(Request $request)
{
    // Obtener el término de búsqueda del formulario
    $findId = $request->input('findId');

    // Realizar la consulta para buscar personas que coincidan con el término
    $people = Person::where('id_card', 'LIKE', "%$findId%")
        ->orWhere('id', 'LIKE', "%$findId%")
        ->orWhere('addres', 'LIKE', "%$findId%")
        ->orWhere('identification_type', 'LIKE', "%$findId%")
        ->orWhere('name', 'LIKE', "%$findId%")
        ->orWhere('rol', 'LIKE', "%$findId%")
        ->orWhere('region_id', 'LIKE', "%$findId%")
        ->orWhere('team_works_id', 'LIKE', "%$findId%")
        ->orWhere('number_phones_id', 'LIKE', "%$findId%")
        ->orWhere('towns_id', 'LIKE', "%$findId%")
        ->orWhere('users_id', 'LIKE', "%$findId%")
        ->paginate();

    // Verificar si no se encontraron resultados
    $mensaje = $people->isEmpty() ? 'No se encontraron datos.' : null;

    // Pasar los resultados de la búsqueda a la vista 'person.index' y paginarlos
    return view('person.index', compact('people', 'mensaje'))
        ->with('i', (request()->input('page', 1) - 1) * $people->perPage());
}

public function buscarCel(Request $request)
{
    // Obtener el término de búsqueda del formulario
    $findCel = $request->input('findCel');

    // Realizar la consulta para buscar números de teléfono que coincidan con el término
    $numberPhones = NumberPhone::where('number', 'LIKE', "%$findCel%")->paginate();

    // Pasar los resultados de la búsqueda a la vista 'number-phone.index' y paginarlos
    return view('number-phone.index', compact('numberPhones'))
        ->with('i', (request()->input('page', 1) - 1) * $numberPhones->perPage());
}
}
