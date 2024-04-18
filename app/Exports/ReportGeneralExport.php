<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportGeneralExport implements FromCollection
{

    use Exportable;

    private $collection;

    public function __construct($arrays)
    {
        $output = [];
        foreach ($arrays as $array) {
            if (!empty($array) && isset($array[0])) {
                $output[] = array_keys($array[0]);
                foreach ($array as $row) {
                    // Remove 'created_at' and 'updated_at' keys from each row
                    // unset($row['created_at'], $row['updated_at']);
                    $output[] = array_values($row);
                }
                $output[] = [''];
            }
        }
        $this->collection = collect($output);
    }

    public function collection()
    {
        return $this->collection;
    }
}
