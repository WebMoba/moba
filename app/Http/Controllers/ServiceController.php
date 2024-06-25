<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServiceExport;
use Illuminate\Support\Facades\Storage;
use App\Models\CategoriesProductsService;
use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
                ->paginate(10);
        } else {
            $services = Service::paginate(10);
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
        $categories_products_service = CategoriesProductsService::where('type', 'servicio')->pluck('name', 'id');
        $editing = false;

        return view('service.create', compact('service', 'categories_products_service', 'editing'));
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
            'date' => 'La fecha de inicio debe ser anterior a la fecha final.',
        ];

        $service = request()->validate(Service::$rules, $customMessages);


        $service = Service::create(array_merge($request->all(), ['image' => $request->file('image')->store('uploads', 'public'), 'disable' => 0,]));

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
        $editing = true;

        return view('service.edit', compact('service', 'categories_products_service', 'editing'));
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
        $customMessages = [
            'required' => 'El campo es obligatorio.',
            'date' => 'La fecha de inicio debe ser anterior a la fecha final.',
        ];

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
        $service = Service::find($id);
        $service->disable=!$service->disable;
        $service->save();
        return redirect()->route('service.index')
            ->with('success', 'Servicio Eliminado Exitosamente');
    }

    public function pdf()
    {

        $services = Service::all();

        $pdf = Pdf::loadView('service.pdf-template', ['services' => $services])
                    ->setPaper('a4','portrait');

        $pdf->set_option('isRemoteEnabled', true);

        return $pdf->download('Listado Servicios.pdf');
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
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->loadHtml(view('service.pdf-template', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('Servicios.pdf');
    }
    
    public function export()
    {
        return Excel::download(new ServiceExport, 'servicios.xlsx');
    }
}
