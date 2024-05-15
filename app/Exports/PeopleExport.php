<?php
// app/Exports/PeopleExport.php

namespace App\Exports;

use App\Models\Person;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PeopleExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('person/exportPerson', [
            'persons' => Person::all()
        ]);
    }
}
