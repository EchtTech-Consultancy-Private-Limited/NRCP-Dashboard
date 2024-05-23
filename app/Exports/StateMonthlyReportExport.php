<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StateMonthlyReportExport implements FromCollection, WithHeadings, WithStyles
{
    use Exportable;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $output = [];

        foreach ($this->data as $array) {
            foreach ($array as $row) {
                $rowData = [];

                foreach ($row as $key => $value) {
                    if (is_array($value)) {
                        $singleValueString = '';
                        $numberOfWounds = [];
                        foreach ($value as $subKey => $subValue) {
                            if (is_array($subValue)) {
                                $woundString = '';
                                foreach ($subValue as $subSubKey => $subSubValue) {
                                    $woundString .= "$subKey.'[$subSubKey]'. => $subSubValue, ";
                                }
                                $woundString = rtrim($woundString, ', ');
                                $numberOfWounds[] = $woundString;
                            } else {
                                $singleValueString .= "$subKey => $subValue, ";
                            }
                        }
                        $singleValueString = rtrim($singleValueString, ', ');
                        $rowData[$key] = $singleValueString . implode('; ', $numberOfWounds);
                    } else {
                        $rowData[$key] = $value;
                    }
                }
                $output[] = $rowData;
            }
        }
        return collect($output);
    }

    public function headings(): array
    {
        $keys = [];
        foreach ($this->data as $array) {
            foreach ($array as $row) {
                $keys = array_merge($keys, array_keys($row));
            }
        }
        $formattedKeys = array_map([$this, 'formatHeader'], array_unique($keys));
        return $formattedKeys;
    }

    private function formatHeader($key)
    {
        return ucwords(str_replace('_', ' ', $key));
    }

    public function styles(Worksheet $sheet)
    {
        $highestColumn = $sheet->getHighestColumn();
        $headerRow = 1;

        // Apply styles to the header row
        $sheet->getStyle("A{$headerRow}:{$highestColumn}{$headerRow}")->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FF000000'], // Black color
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFFFFF00', // Yellow color
                ],
            ],
        ]);
    }
}
