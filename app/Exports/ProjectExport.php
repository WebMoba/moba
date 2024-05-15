<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProjectExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('project/exportProject', [
            'project' => Project::all()
        ]);
    }
}
