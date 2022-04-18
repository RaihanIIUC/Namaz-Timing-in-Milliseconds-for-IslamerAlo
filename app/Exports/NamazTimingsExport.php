<?php

namespace App\Exports;

use App\Models\NamazTiming;
use Maatwebsite\Excel\Concerns\FromCollection;

class NamazTimingsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return NamazTiming::all();

        return  NamazTiming::all(
            'ফজর শুরু',
            'ফজর শেষ',
            'জোহর শুরু',
            'জোহর শেষ',
            'আসর শুরু',
            'আসর শেষ',
            'মাগরিব, ইফতার',
            'মাগরিব শেষ',
            'এশা শুরু',
            'এশা শেষ'
        );
    }
}
