<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;

class NationalReportExport implements FromCollection, WithStyles
{
    use Exportable;

    private $collection;
    private $headerIndexes = [];

    public function __construct($arrays)
    {
        $output = [];
        $headerAdded = false;

        foreach ($arrays as $array) {
            if (!empty($array) && isset($array[0])) {
                foreach ($array as $key => $row) {
                    unset($row['created_at'], $row['deleted_at'], $row['soft_delete'],$row['state_id'], $row['institute_id'], $row['updated_at']);

                    if (!$headerAdded) {
                        $formattedKeys = array_map([$this, 'formatHeader'], array_keys($row));
                        $output[] = $formattedKeys; // Add main header row only if not already added
                        $this->headerIndexes[] = count($output); // Track header row index
                        $headerAdded = true;
                    }

                    $outputRow = [];
                    foreach ($row as $key => $value) {
                        if ($key == 'state') {
                            $outputRow['state_name'] = $value['state_name'];
                        } elseif ($key == 'institute') {
                            $outputRow['institute_name'] = $value['name'];
                        } else {
                            $outputRow[$key] = $value;
                        }
                    }

                    $output[] = $outputRow;
                    $output[] = array_fill(0, count($outputRow), ''); // Add an empty row for separation if needed
                }
            }
        }

        $this->collection = collect($output);
    }

    private function formatHeader($key)
    {
        return ucwords(str_replace('_', ' ', $key));
    }

    public function collection()
    {
        return $this->collection;
    }

    public function styles(Worksheet $sheet)
    {
        foreach ($this->headerIndexes as $headerIndex) {
            $sheet->getStyle('A' . $headerIndex . ':' . $sheet->getHighestColumn() . $headerIndex)->applyFromArray([
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FF000000'], // Black color
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'FFFFFF00', // Yellow color
                    ]
                ]
            ]);
        }
    }
}
