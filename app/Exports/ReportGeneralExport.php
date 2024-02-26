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

    // public function __construct(int $employer_id,$employeeArray)
    // {
    // 	$this->employer_id = $employer_id;
	// }

    use Exportable;

    private $collection;

    public function __construct($arrays)
    {
        $output = [];

        foreach ($arrays as $array) {
            // get headers for current dataset
            $output[] = array_keys($array[0]);
            // store values for each row
            foreach ($array as $row) {
                $output[] = array_values($row);
            }
            // add an empty row before the next dataset
            $output[] = [''];
        }

        $this->collection = collect($output);
    }

    public function collection()
    {
        return $this->collection;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Equipments::select("id", "equipment", "quantity")->get();
    //     return GeneralProfile::select("id", "state", "hospital","designation","contact_number","mou","date_of_joining")->get();
    // }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function headings(): array
    // {
    //     return ["ID", "Equipment", "Quantity"];
    // }
}
