<?php

namespace App\Http\Controllers;

use App\Exports\Excel\DogSheet;
use App\Exports\Excel\DogWorkbook;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class DogController extends Controller
{
    public function downloadImportTemplate()
    {
        $dogWorkbook = App::make(DogWorkbook::class);
        return Excel::download($dogWorkbook, 'DogImportTemplate.xlsx');
    }
}
