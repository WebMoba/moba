<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $events = Event::paginate();

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
            'date' => 'El campo :no debe ser una fecha anterior al dia de Hoy.',
        ];

        $request->validate([
            'place' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'importance_range' => 'required|string|in:baja,media,alta',
        ], $customMessages);



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
}
