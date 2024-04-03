<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Dompdf\Dompdf;
use Dompdf\Options;
/**
 * Class EventController
 * @package App\Http\Controllers
 */
class EventController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate();

        return view('event.index', compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * $events->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = new Event();
        return view('event.create', compact('event')) ;

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
            'date_end.after_or_equal' => 'La fecha de finalización debe ser igual o posterior a la fecha de inicio.',
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cadena de texto.',
            'date' => 'El campo no debe ser una fecha anterior al dia de Hoy.',
        ];

        $request->validate([
            'place' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'importance_range' => 'required|string|in:baja,media,alta',
        ], $customMessages);

        $event = Event::create($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Evento creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        // Formatea las fechas para que se muestren correctamente en los campos de entrada de fecha
        $event->date_start = optional($event->date_start)->format('Y-m-d');
        $event->date_end = optional($event->date_end)->format('Y-m-d');
        return view('event.edit', compact('event'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $customMessages = [
            'date_end.after_or_equal' => 'La fecha de finalización debe ser igual o posterior a la fecha de inicio.',
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'date' => 'El campo :attribute no debe ser una fecha anterior al dia de Hoy.',
        ];

        $request->validate([
            'place' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'importance_range' => 'required|string|in:baja,media,alta',
        ],$customMessages);

        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Evento actualizado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();

        return redirect()->route('events.index')

           ->with('success', 'Evento Eliminado con Exito');
    }

    public function generatePDF(Request $request)
{
    // Obtener el filtro de la solicitud
    $filter = $request->input('findId');
    
    // Obtener los datos de los eventos filtrados si se aplicó un filtro
    if ($filter) {
        $events = Event::where('place', $filter)->get();
    } else {
        // Si no hay filtro, obtener todos los eventos
        $events = Event::all();
    }
    
    // Pasar los datos a la vista pdf-template
    $data = [
        'events' => $events
    ];
    
    // Generar el PDF
    $pdf = new Dompdf();
    $pdf->loadHtml(view('event.pdf-template', $data));

    $pdf->setPaper('A4', 'portrait');

    $pdf->render();

    return $pdf->stream('document.pdf');
}

}