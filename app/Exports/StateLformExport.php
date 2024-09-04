<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;

class StateLformExport implements FromCollection, WithStyles
{
    use Exportable;

    private $collection;
    private $headerIndexes = [];

    public function __construct($arrays)
    {
        $output = [];
        $headerAdded = false;
        $stateUserCaseHeaderAdded = false;
        $lineSuspectedCaseHeaderAdded = false;

        foreach ($arrays as $array) {
            if (!empty($array) && isset($array[0])) {
                foreach ($array as $row) {
                    unset($row['created_at'], $row['deleted_at'], $row['updated_at']);
                    if (!$headerAdded) {
                        $formattedKeys = array_map([$this, 'formatHeader'], array_keys($row));
                        $output[] = $formattedKeys; // Add main header row only if not already added
                        $this->headerIndexes[] = count($output); // Track header row index
                        $headerAdded = true;
                    }
                    $outputRow = [];
                    foreach ($row as $key => $value) {
                        if ($key === 'state_user_l_form_count_case' && is_array($value)) {
                            if (!$stateUserCaseHeaderAdded) {
                                $caseSample = $value[0];
                                $caseHeaders = array_keys($this->flattenCaseArray($caseSample));
                                $formattedCaseHeaders = array_map([$this, 'formatHeader'], $caseHeaders);
                                $output[] = array_fill(0, count($row), ''); // Add an empty row
                                $output[] = array_merge(array_fill(0, count($row), ''), $formattedCaseHeaders); // Add formatted case headers
                                $this->headerIndexes[] = count($output); // Track header row index
                                $stateUserCaseHeaderAdded = true;
                            }
                            foreach ($value as $LformCases) {
                                $caseArray = $this->flattenCaseArray($LformCases);
                                $output[] = array_merge(array_fill(0, count($row), ''), $caseArray);
                            }
                        } elseif ($key === 'line_suspected_calculate' && is_array($value)) {
                            if (!$lineSuspectedCaseHeaderAdded) {
                                $caseSample = $value[0];
                                $caseHeaders = array_keys($this->flattenCaseArray($caseSample));
                                $formattedCaseHeaders = array_map([$this, 'formatHeader'], $caseHeaders);
                                $output[] = array_fill(0, count($row), ''); // Add an empty row
                                $output[] = array_merge(array_fill(0, count($row), ''), $formattedCaseHeaders); // Add formatted case headers
                                $this->headerIndexes[] = count($output); // Track header row index
                                $lineSuspectedCaseHeaderAdded = true;
                            }
                            foreach ($value as $LformCases) {
                                $caseArray = $this->flattenCaseArray($LformCases);
                                $output[] = array_merge(array_fill(0, count($row), ''), $caseArray);
                            }
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

    private function flattenCaseArray($LformCases)
    {
        $caseArray = [];
        if (is_array($LformCases)) {
            foreach ($LformCases as $caseKey => $LformCase) {
                if ($caseKey === 'states' && isset($LformCase['name'])) {
                    $caseArray['state'] = $LformCase['name'];
                } elseif ($caseKey === 'city' && isset($LformCase['name'])) {
                    $caseArray['district'] = $LformCase['name'];
                } else {
                    $caseArray[$caseKey] = $LformCase;
                }
            }
            unset($caseArray['states'], $caseArray['city'], $caseArray['id'], $caseArray['state_user_l_forms_id'], $caseArray['lform_state_id'], $caseArray['lform_district_id'], $caseArray['deleted_at'], $caseArray['created_at'], $caseArray['updated_at'], $caseArray['line_suspected_form_id']);
        }
        return $caseArray;
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
