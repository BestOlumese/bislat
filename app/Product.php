<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getImage1Attribute($image1)
	{
		return asset($image1);
    }

    public function getImage2Attribute($image2)
	{
		return asset($image2);
    }

    public function getImage3Attribute($image3)
	{
		return asset($image3);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
