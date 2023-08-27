<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DogTypesSheet implements FromCollection, WithHeadingRow, WithTitle
{
    const SHEET_TITLE = "Dog Types";

    public function collection()
    {
        return collect(
            [
                [
                    'Type'
                ],
                [

                    'Black Fell Terrier',
                ],
                [
                    'Husky Mix',
                ],
                [
                   'Shepard Mix',
                ],
            ]
        );
    }

    public function title(): string
    {
        return self::SHEET_TITLE;
    }
}
