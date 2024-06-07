<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LineSuspected extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'suspected_date',
        'name_of_health',
        'address_hospital',
        'designation_name',
        'type_of_health',
        'email',
        'aadhar_number',
    ];

    /**
     * @LineSuspectedCalculate
     *
     * @return void
     */
    public function lineSuspectedCalculate()
    {
        return $this->hasMany(LineSuspectedCalculate::class, 'line_suspected_form_id');
    }
}
