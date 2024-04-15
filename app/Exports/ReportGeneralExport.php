<?php

namespace App\Exports;

use App\Models\Equipments;
use App\Models\Expenditure;
use App\Models\GeneralProfile;
use App\Models\QualityAssurance;
use App\Models\RabiesTest;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportGeneralExport implements FromCollection
{

    use Exportable;

    private $collection;

    public function __construct($arrays)
    {
        $output = [];
        foreach ($arrays as $array) {
            $output[] = array_keys($array[0]);
            foreach ($array as $row) {
                // Remove 'created_at' and 'updated_at' keys from each row
                // unset($row['created_at'], $row['updated_at']);
                $output[] = array_values($row);
            }
            $output[] = [''];
        }
        $this->collection = collect($output);
    }

    public function collection()
    {
        return $this->collection;
    }
}
