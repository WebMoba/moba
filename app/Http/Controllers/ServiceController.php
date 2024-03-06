<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
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
        $search = request()->input('search');

        if (!empty($search)) {
            $services = Service::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('date_start', 'like', '%' . $search . '%')
                    ->orWhere('date_end', 'like', '%' . $search . '%');
            })
                ->paginate();
        } else {
            $services = Service::paginate();
        }


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
        $customMessages = ['required' => 'El campo es obligatorio.'];

        $service = request()->validate(Service::$rules, $customMessages);

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
            Storage::disk('public')->delete($service->image);
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
    public function generatePDF(Request $request)
    {
        // Obtener el filtro de la solicitud
        $filter = $request->input('findId');

        // Obtener los datos de las personas filtradas si se aplicó un filtro
        if ($filter) {
            $services = Service::where('name', $filter)->get();
        } else {
            // Si no hay filtro, obtener todas las personas
            $services = Service::all();
        }
        // Pasar los datos a la vista pdf-template
        $data = [
            'services' => $services
        ];

        // Generar el PDF
        $pdf = new Dompdf();
        $pdf->loadHtml(view('service.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('vista de servicios.pdf');
    }
}
