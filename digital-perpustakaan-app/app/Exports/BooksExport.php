<?php

namespace App\Exports;

use App\Models\books;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BooksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return books::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Title',
            'Description',
            'Quantity',
            'PDF Path',
            'IMG Path',
            'Category',
            'User Id',
            'Created at',
            'Updated at',
        ];
    }
}
