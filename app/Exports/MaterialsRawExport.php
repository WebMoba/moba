<?php

namespace App\Exports;

use App\Models\MaterialsRaw;
use Maatwebsite\Excel\Concerns\FromCollection;

class MaterialsRawExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MaterialsRaw::all();
    }
}
