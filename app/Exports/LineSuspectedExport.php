<?php

namespace App\Exports;

use App\Models\LineSuspected;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LineSuspectedExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return LineSuspected::all();
    }

    public function headings(): array
    {
        // Get column names from the database table
        return Schema::getColumnListing((new LineSuspected())->getTable());
    }
}
