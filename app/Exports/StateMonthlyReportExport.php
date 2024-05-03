<?php

namespace App\Exports;

use App\Models\StateMonthlyReport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StateMonthlyReportExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return StateMonthlyReport::all();
    }

    public function headings(): array
    {
        // Get column names from the database table
        return Schema::getColumnListing((new StateMonthlyReport())->getTable());
    }
}

