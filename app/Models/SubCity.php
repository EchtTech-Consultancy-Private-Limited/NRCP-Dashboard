<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCity extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'state_id',
        'district_id',
        'code',
        'name',
        'abbreviation',
    ];
}
