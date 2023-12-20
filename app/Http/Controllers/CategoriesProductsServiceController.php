<?php

namespace App\Http\Controllers;

use App\Models\CategoriesProductsService;
use Illuminate\Http\Request;

/**
 * Class CategoriesProductsServiceController
 * @package App\Http\Controllers
 */
class CategoriesProductsServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesProductsServices = CategoriesProductsService::paginate();

        return view('categories-products-service.index', compact('categoriesProductsServices'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriesProductsServices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesProductsService = new CategoriesProductsService();
        return view('categories-products-service.create', compact('categoriesProductsService'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CategoriesProductsService::$rules);

        $categoriesProductsService = CategoriesProductsService::create($request->all());

        return redirect()->route('categories-products-service.index')
            ->with('success', 'CategoriesProductsService created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriesProductsService = CategoriesProductsService::find($id);

        return view('categories-products-service.show', compact('categoriesProductsService'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriesProductsService = CategoriesProductsService::find($id);

        return view('categories-products-service.edit', compact('categoriesProductsService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriesProductsService $categoriesProductsService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriesProductsService $categoriesProductsService)
    {
        request()->validate(CategoriesProductsService::$rules);

        $categoriesProductsService->update($request->all());

        return redirect()->route('categories-products-service.index')
            ->with('success', 'CategoriesProductsService updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoriesProductsService = CategoriesProductsService::find($id)->delete();

        return redirect()->route('categories-products-service.index')
            ->with('success', 'CategoriesProductsService deleted successfully');
    }
}
