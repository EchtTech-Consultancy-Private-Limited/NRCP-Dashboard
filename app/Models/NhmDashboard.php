<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhmDashboard extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'year',
        'state_id',
        'rops',
        'rops_size',
        'supplementary_rops',
        'supplementary_rops_size',
    ];
    
    /**
     * state relation b/w nhm and state
     *
     * @return void
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
