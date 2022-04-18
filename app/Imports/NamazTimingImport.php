<?php

namespace App\Imports;

use App\Models\NamazTiming;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Classes\Bengali;

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

        return new NamazTiming([
            'ফজর শুরু'  => $belgaliClass->en_number($row[0]),
            'ফজর শেষ' => $belgaliClass->en_number($row[1]),
            'জোহর শুরু'    => $belgaliClass->en_number($row[2]),
            'জোহর শেষ' => $belgaliClass->en_number($row[3]),
            'আসর শুরু'    => $belgaliClass->en_number($row[4]),
            'আসর শেষ' => $belgaliClass->en_number($row[5]),
            'মাগরিব, ইফতার' => $belgaliClass->en_number($row[6]),
            'মাগরিব শেষ' => $belgaliClass->en_number($row[7]),
            'এশা শুরু'    => $belgaliClass->en_number($row[8]),
            'এশা শেষ' => $belgaliClass->en_number($row[9])
        ]);
    }
}
