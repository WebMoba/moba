<?php

namespace App\Http\Controllers;

use App\Models\NumberPhone;
use Illuminate\Http\Request;

/**
 * Class NumberPhoneController
 * @package App\Http\Controllers
 */
class NumberPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $numberPhones = NumberPhone::orderBy('created_at', 'desc')->paginate();

    return view('number-phone.index', compact('numberPhones'))
        ->with('i', (request()->input('page', 1) - 1) * $numberPhones->perPage());
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $numberPhone = new NumberPhone();
        return view('number-phone.create', compact('numberPhone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'number' => 'required', // Asegúrate de que el campo 'number' no esté vacío
        ]);

        // Crear el número de teléfono en la base de datos
        $numberPhone = NumberPhone::create($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->route('number-phone.index')
            ->with('success', 'Número de Teléfono creado con éxito.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $numberPhone = NumberPhone::find($id);

        return view('number-phone.show', compact('numberPhone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $numberPhone = NumberPhone::find($id);

        return view('number-phone.edit', compact('numberPhone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  NumberPhone $numberPhone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberPhone $numberPhone)
    {
        request()->validate(NumberPhone::$rules);

        $numberPhone->update($request->all());

        return redirect()->route('number-phone.index')
            ->with('success', 'Numero de telefono actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Buscar el número de teléfono por su ID
        $numberPhone = NumberPhone::find($id);
    
        // Verificar si el número de teléfono existe
        if (!$numberPhone) {
            return redirect()->route('number-phone.index')
                ->with('error', 'El número de teléfono no existe.');
        }
    
        // Verificar si el número de teléfono está asociado a alguna persona
        if ($numberPhone->people()->exists()) {
            return redirect()->route('number-phone.index')
                ->with('warning', 'El número de teléfono está asociado a una o más personas y no puede ser eliminado.');
        }
    
        // Si no está asociado a ninguna persona, eliminar el número de teléfono
        $numberPhone->delete();
    
        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('number-phone.index')
            ->with('success', 'El número de teléfono fue eliminado con éxito.');
    }
}

