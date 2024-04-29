<?php

namespace App\Imports;

use App\Models\PFormPatientRecord;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PFormPatientRecordImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        if($row['country_code'])
        {
            return new PFormPatientRecord([
            'country_code' => $row['country_code'],
            'citizenship' => $row['citizenship'],
            'pform_state' => $row['pform_state'],
            'pform_city' => $row['pform_city'],
            'mobile_number' => $row['mobile_number'],
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'birth_of_date' => $row['birth_of_date'],
            'gender' => $row['gender'],
            'id_type' => $row['id_type'],
            'identification_number' => $row['identification_number'],
            'taluka' => $row['taluka'],
            'village' => $row['village'],
            'house_no' => $row['house_no'],
            'street_name' => $row['street_name'],
            'landmark' => $row['landmark'],
            'pincode' => $row['pincode'],
            'provisinal_diagnosis' => $row['provisinal_diagnosis'],
            'date_of_onset' => $row['date_of_onset'],
            'opd_ipd' => $row['opd_ipd'],
            'test_suspected' => $row['test_suspected'],
            'type_of_sample' => $row['type_of_sample'],
            'test_resquested' => $row['test_resquested'],
            'sample_date' => $row['sample_date'],
            'form_type' => $row['form_type'],
        ]);
    }
    }
}
