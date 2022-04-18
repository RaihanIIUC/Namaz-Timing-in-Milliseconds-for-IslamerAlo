<?php

namespace App\Http\Controllers;

use App\Classes\Bengali;
use App\Exports\NamazTimingsExport;
use App\Imports\NamazTimingImport;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class NamazTimingController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function NamazTimingImportExport()
    {
        return view('Namazfile-import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        Excel::import(new NamazTimingImport, $request->file('file')->store('temp'));
        return dd(Excel::toArray($request, $request->file('file')->store('temp')));
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new NamazTimingsExport, 'namaztiming-collection.xlsx');
    }

    public function TimeConvertion()
    {
    }
}
