<?php

namespace App\Exports;

use App\Models\Service;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ServiceExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('service/exportService', [
            'services' => Service::all()
        ]);
    }
}
