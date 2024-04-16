<?php

namespace App\Exports;

use App\Models\TeamWork;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeamWorkExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TeamWork::all();
    }
}
