<?php

namespace App\Http\Controllers;

use App\Exports\Excel\DogExport;
use Maatwebsite\Excel\Facades\Excel;

class DogController extends Controller
{
    public function downloadImportTemplate()
    {
        return Excel::download(new DogExport(), 'DogImportTemplate.xlsx');
    }
}
