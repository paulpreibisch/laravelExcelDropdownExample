<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DogSheet implements FromCollection, WithHeadingRow, WithStyles, WithTitle
{
    public const SHEET_TITLE = 'Dogs';

    public function collection()
    {
        return collect(
            [
                [
                    'id','name','type'
                ],
                [
                    'id'   => 1,
                    'name' => 'Midnight',
                    'dog_type' => 'Black Fell Terrier',
                ],
                [
                    'id'   => 2,
                    'name' => 'Celeste',
                    'dog_type' => 'Husky Mix',
                ],
                [
                    'id'   => 3,
                    'name' => 'Renata',
                    'dog_type' => 'Shepard Mix',
                ],
            ]
        );
    }
    public function styles(Worksheet $sheet)
    {
        $validation = $sheet->getCell('C1')->getDataValidation();
        $validation->setType(DataValidation::TYPE_LIST);
        $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
        $validation->setAllowBlank(true);
        $validation->setShowInputMessage(true);
        $validation->setShowErrorMessage(true);
        $validation->setShowDropDown(true);
        $validation->setErrorTitle('Input error');
        $validation->setError('Value is not in list.');
        $validation->setPromptTitle('Pick from list');
        $validation->setPrompt('Please pick a value from the drop-down list.');
        $validation->setFormula1('\'' . DogTypesSheet::SHEET_TITLE . '\'!$A$2:$A$10000');

        $validation->setSqref("C1:C10000");
    }

    public function title(): string
    {
        return self::SHEET_TITLE;
    }
}
