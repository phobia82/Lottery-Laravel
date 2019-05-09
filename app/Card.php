<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    
	protected $fillable = ['id','name','card_id','user_id','event_id','status'];    

	 /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
	
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
