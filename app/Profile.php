<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function getFeaturedAttribute($featured)
	{
		return asset($featured);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
