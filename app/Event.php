<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'id', 'name', 'start'
    ];
	
    public function cards()
    {
        return $this->hasMany('App\Card');
    }
}
