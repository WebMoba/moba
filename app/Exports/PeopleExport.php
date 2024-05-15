<?php
// app/Exports/PeopleExport.php

namespace App\Exports;

use App\Models\Person;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

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
class InvoicesExport implements WithColumnWidths
{
    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 45,            
        ];
    }
}