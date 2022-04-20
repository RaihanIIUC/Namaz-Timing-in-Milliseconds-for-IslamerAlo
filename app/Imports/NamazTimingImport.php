<?php

namespace App\Imports;

use App\Models\NamazTiming;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Classes\Bengali;
use Illuminate\Http\Request;


class NamazTimingImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $belgaliClass = new Bengali();
        $request = request()->all();

        return new NamazTiming([
            'year' =>  $request['year'],
            'month' => $request['month'],
            'তারিখ' => $belgaliClass->en_number($row[1]),
            'ফজর শুরু'  => $belgaliClass->en_number($row[0]),
            'ফজর শেষ' => $belgaliClass->en_number($row[2]),
            'জোহর শুরু'    => $belgaliClass->en_number($row[4]),
            'জোহর শেষ' => $belgaliClass->en_number($row[5]),
            'আসর শুরু'    => $belgaliClass->en_number($row[6]),
            'আসর শেষ' => $belgaliClass->en_number($row[7]),
            'মাগরিব, ইফতার' => $belgaliClass->en_number($row[8]),
            'মাগরিব শেষ' => $belgaliClass->en_number($row[9]),
            'এশা শুরু'    => $belgaliClass->en_number($row[10]),
            'এশা শেষ' => $belgaliClass->en_number($row[11])
        ]);
    }
}
