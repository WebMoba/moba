<?php

namespace App\Exports;

use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QuoteExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('quote/exportQuote', [
            'quote' => Quote::all()
        ]);
    }
}
