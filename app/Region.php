<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['region'];
    
    public function tickets() {
        return $this->belongsToMany('App\Ticket', 'region_tickets');
    }
}
