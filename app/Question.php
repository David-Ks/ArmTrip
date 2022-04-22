<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'topic', 'message', 'is_answered', 'user_id',
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
