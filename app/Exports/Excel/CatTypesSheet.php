<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CatTypesSheet implements FromCollection, WithHeadingRow, WithTitle
{
    public const SHEET_TITLE = "Cat Types";

    public function collection()
    {
        return collect(
            [
                [
                    'Type'
                ],
                [
                    'Persian'
                ],
                [
                    'British Longhair'
                ],
                [
                    'Donskoy'
                ],
                [
                    'German Rex'
                ],
                [
                    'Himalayan'
                ],
                [
                    'Maine Coon'
                ],
                [
                    'Manx'
                ],
                [
                    'Munchkin'
                ],
                [
                    'Russian Blue'
                ],
                [
                    'Siamese Modern'
                ],
            ]
        );
    }

    public function title(): string
    {
        return self::SHEET_TITLE;
    }
}
