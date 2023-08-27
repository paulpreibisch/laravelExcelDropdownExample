<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DogWorkbook implements WithMultipleSheets
{
    private DogSheet $dogSheet;
    private DogTypesSheet $dogTypesSheet;
    public function __construct(DogSheet $dogSheet, DogTypesSheet $dogTypesSheet)
    {
        $this->dogSheet = $dogSheet;
        $this->dogTypesSheet = $dogTypesSheet;
    }


    public function sheets(): array
    {
        return [
            "Dogs" => $this->dogSheet,
            "DogTypes" => $this->dogTypesSheet
        ];
    }
}
