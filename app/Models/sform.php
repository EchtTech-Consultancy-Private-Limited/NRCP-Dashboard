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
        'age_of_5',
        'number_of_cases_of_illness',
        'gender',
    ];


}
