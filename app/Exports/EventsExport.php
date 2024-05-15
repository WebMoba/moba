<?php

namespace App\Exports;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EventsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('event/exportEvent', [
            'events' => Event::all()

        ]);
    }
}
