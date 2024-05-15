<?php

namespace App\Exports;

use App\Models\TeamWork;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TeamWorkExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('team-work/exportTeamWork', [
            'teamwork' => TeamWork::all()
        ]);
    }
}
