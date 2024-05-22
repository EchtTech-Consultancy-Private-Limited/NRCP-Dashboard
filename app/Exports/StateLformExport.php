<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class StateLformExport implements FromCollection
{
    use Exportable;

    private $collection;

    public function __construct($arrays)
    {
        $output = [];
        $headerAdded = false;
        $caseHeaderAdded = false;
        foreach ($arrays as $array) {
            if (!empty($array) && isset($array[0])) {
                foreach ($array as $row) {
                    unset($row['created_at'], $row['deleted_at'], $row['updated_at']);
                    if (!$headerAdded) {
                        $output[] = array_keys($row); // Add main header row only if not already added
                        $headerAdded = true;
                    }
                    $outputRow = [];
                    foreach ($row as $key => $value) {
                        if ($key === 'state_user_l_form_count_case' && is_array($value)) {
                            if (!$caseHeaderAdded) {
                                $caseSample = $value[0];
                                $caseHeaders = array_keys($this->flattenCaseArray($caseSample));
                                $output[] = array_fill(0, count($row), ''); // Add an empty row
                                $output[] = array_merge(array_fill(0, count($row), ''), $caseHeaders); // Add case headers
                                $caseHeaderAdded = true;
                            }
                            foreach ($value as $LformCases) {
                                $caseArray = $this->flattenCaseArray($LformCases);
                                $output[] = array_merge(array_fill(0, count($row), ''), $caseArray);
                            }
                        }elseif($key === 'line_suspected_calculate' && is_array($value)){
                            if (!$caseHeaderAdded) {
                                $caseSample = $value[0];
                                $caseHeaders = array_keys($this->flattenCaseArray($caseSample));
                                $output[] = array_fill(0, count($row), ''); // Add an empty row
                                $output[] = array_merge(array_fill(0, count($row), ''), $caseHeaders); // Add case headers
                                $caseHeaderAdded = true;
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
}

