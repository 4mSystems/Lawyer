<?php

namespace App\Exports;

use App\mohdr;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class MohdareenExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('exports.mohdar_export', [
            'mohdareen' => mohdr::all()
        ]);
    }
}
