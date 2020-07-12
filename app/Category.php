<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','featured','content'
    ];

    public function getFeaturedAttribute($featured)
	{
		return asset($featured);
    }

    public function subcategory()
	{
		return $this->hasMany(Subcategory::class);
    }
}
