<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AnimalsSheet extends DefaultValueBinder implements WithCustomValueBinder, FromCollection, WithHeadingRow, WithStyles, WithTitle
{
    public const SHEET_TITLE = 'Animals';

    public function collection()
    {
        return collect(
            [
                [
                    'name','type','Breed'
                ],
                [

                    'name' => 'Midnight',
                    'type' => 'dog',
                    'breed' => ' '
                ],
                [

                    'name' => 'Celeste',
                    'type' => 'dog',
                    'breed' => ' '
                ],
                [

                    'name' => 'Yuki',
                    'type' => 'cat',
                    'breed' => ' '
                ],
                [

                    'name' => 'Renata',
                    'type' => 'dog',
                    'breed' => ' '
                ],
            ]
        );
    }
    public function bindValue(Cell $cell, $value)
    {

        $validation = $cell->getDataValidation();
        $col = $cell->getColumn();

        $rowNum = $cell->getRow();

        if ($col == 'C' && $rowNum > 1) {

            $sheet = $cell->getWorksheet();


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
            //below is a dynamic formula
            $validation->setFormula1('IF(B'.$rowNum.'="dog",\''. DogTypesSheet::SHEET_TITLE . '\'!$A$2:$A$10000,\''. CatTypesSheet::SHEET_TITLE . '\'!$A$2:$A$10000)');
            $cell = $sheet->getCell($col.$rowNum);

        }

        return parent::bindValue($cell, $value);

    }
    public function styles(Worksheet $sheet)
    {
        $validation = $sheet->getCell('B1')->getDataValidation();
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
        $validation->setFormula1('dog,cat');

        $validation->setSqref("B1:B10000");


    }

    public function title(): string
    {
        return self::SHEET_TITLE;
    }
}
