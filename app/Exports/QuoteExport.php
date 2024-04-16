<?php

namespace App\Exports;

use App\Models\Quote;
use Maatwebsite\Excel\Concerns\FromCollection;

class QuoteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Quote::all();
    }
}
