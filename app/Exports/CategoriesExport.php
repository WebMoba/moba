<?php

namespace App\Exports;

use App\Models\CategoriesProductsService;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoriesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CategoriesProductsService::all();
    }
}
