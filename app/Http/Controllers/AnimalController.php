<?php

namespace App\Http\Controllers;

use App\Exports\Excel\AnimalsWorkbook;
use App\Exports\Excel\DogSheet;
use App\Exports\Excel\DogWorkbook;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class AnimalController extends Controller
{
    public function downloadAnimalsTemplate()
    {
        $animalsWorkbook = App::make(AnimalsWorkbook::class);
        return Excel::download($animalsWorkbook, 'AnimalsImportTemplate.xlsx');
    }

}
