<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DogExport implements FromCollection, WithHeadingRow
{
    public function collection()
    {
        return collect([
            [
              'Name',
              'Type'
            ],
            [
          'Midnight',
          'Black Fell Terrier',
            ],
            [
                'Celeste',
                'Husky Mix',
            ]
        ]);
    }
}
