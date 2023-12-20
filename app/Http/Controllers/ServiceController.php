<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\CategoriesProductsService;
use App\Models\Service;
use Illuminate\Http\Request;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate();

        return view('service.index', compact('services'))
            ->with('i', (request()->input('page', 1) - 1) * $services->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new Service();
        $categories_products_service = CategoriesProductsService::pluck('name', 'id');
        return view('service.create', compact('service', 'categories_products_service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = request()->validate(Service::$rules);

        $service = Service::create(array_merge($request->all(), ['image' => $request->file('image')->store('uploads', 'public')]));

        return redirect()->route('service.index')
            ->with('success', 'Servicio Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $categories_products_service = CategoriesProductsService::pluck('name', 'id');
        return view('service.edit', compact('service', 'categories_products_service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $customMessages = ['required' => 'El campo es obligatorio.'];

        $request->validate(Service::$rules, $customMessages);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Guardar la nueva imagen y eliminar la antigua
            Storage::disk('public')->delete( $service->image);
            $service->image = $request->file('image')->store('uploads', 'public');
        }
    
        $service->update($request->except('image'));
        
        return redirect()->route('service.index')
            ->with('success', 'Servicio Editado Exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $service = Service::find($id)->delete();

        return redirect()->route('service.index')
            ->with('success', 'Servicio Eliminado Exitosamente');
    }
}
