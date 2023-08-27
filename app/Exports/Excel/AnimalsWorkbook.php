<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AnimalsWorkbook implements WithMultipleSheets
{
    private DogTypesSheet $dogTypesSheet;
    private CatTypesSheet $catTypesSheet;
    private AnimalsSheet $animalsSheet;
    public function __construct(
        AnimalsSheet $animalsSheet,
        DogTypesSheet $dogTypesSheet,
        CatTypesSheet $catTypesSheet
    ) {
        $this->animalsSheet = $animalsSheet;
        $this->dogTypesSheet = $dogTypesSheet;
        $this->catTypesSheet = $catTypesSheet;
    }


    public function sheets(): array
    {
        return [

            "Animals" => $this->animalsSheet,
            "DogTypes" => $this->dogTypesSheet,
            "CatTypes" => $this->catTypesSheet,
        ];
    }
}
