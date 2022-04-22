<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Ticket extends Model
{
    protected $fillable = ['title', 'content', 'date', 'price', 'img', 'count', 'gid_id'];
    
    public function users() {
        return $this->belongsToMany('App\User', 'ticket_users');
    }

    public function regions() {
        return $this->belongsToMany('App\Region', 'region_tickets');
    }

    public function gid() {
        return $this->hasOne('App\Gid', 'id', 'gid_id');
    }
}
