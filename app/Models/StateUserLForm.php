<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateUserLForm extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'current_date',
        'name_nodal_person',
        'designation_nodal_person',
        'phone_number',
        'email',
        'institute_name',
        'aadhar_number',
    ];

    /**
     * @StateUserLFormCountCase
     *
     * @return void
     */
    public function stateUserLFormCountCase()
    {
        return $this->hasMany(StateUserLFormCountCase::class, 'state_user_l_forms_id');
    }
    
}
