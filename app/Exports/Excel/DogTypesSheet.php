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
    public const SHEET_TITLE = "Dog Types";

    public function collection()
    {
        return collect(
            [
                [
                    'Type'
                ],
                [
                    'Airedale Terrier'
                ],
                [
                    'Akita'
                ],
                [
                    'Alaskan Malamute'
                ],
                [
                    'American Bulldog'
                ],
                [
                    'American Bully (Standard)'
                ],
                [
                    'American Eskimo Dog (Miniature)'
                ],
                [
                    'American Eskimo Dog (Standard)'
                ],
                [
                    'Am. Staffordshire Terrier'
                ],
                [
                    'American Pit Bull Terrier'
                ],
                [
                    'Australian Cattle Dog (Heeler)'
                ],
                [
                    'Australian Kelpie'
                ],
                [
                    'Australian Shepherd'
                ],
                [
                    'Austrialian Terrier'
                ],
                [
                    'Barbet'
                ]
                ]
        );
    }

    public function title(): string
    {
        return self::SHEET_TITLE;
    }
}
