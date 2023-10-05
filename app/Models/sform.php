<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sform extends Model
{
    use HasFactory;
    protected $table="sform";

    protected $fillable = [
        'illness_senario',
        'male_less_5_age_illness',
        'male_greater_5_age_illness',
        'male_total_illness',
        'female_less_5_age_illness',
        'female_greater_5_age_illness',
        'female_total_illness',
        'grand_total_illness',
        'male_deths',
        'female_deths',
        'total_deths',
        
    ];


}
