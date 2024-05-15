<?php

namespace App\Exports;

use App\Models\MaterialsRaw;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MaterialsRawExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('materials-raw/exportMaterialsRaws', [
            'materials_raws' => MaterialsRaw::all()
        ]);
    }
}
