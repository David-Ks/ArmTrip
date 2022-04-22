<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviw extends Model
{
    protected $fillable = ['content', 'raiting', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
