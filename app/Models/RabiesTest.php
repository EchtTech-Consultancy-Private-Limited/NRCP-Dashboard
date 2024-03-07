<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RabiesTest extends Model
{
    use HasFactory;
    
    /**
     * state
     *
     * @return void
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    
    /**
     * institute
     *
     * @return void
     */
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }
}
