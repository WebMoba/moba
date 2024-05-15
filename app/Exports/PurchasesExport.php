<?php

namespace App\Exports;

use App\Models\Purchase;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PurchasesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('purchase/exportPurchase', [
            'purchases' => Purchase::all()
        ]);
    }
}
