<?php

namespace App\Exports;

use App\Models\CategoriesProductsService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CategoriesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('categories-products-service/exportCategories', [
            'categoriesProductsServices' => CategoriesProductsService::all()
        ]);
    }
}
