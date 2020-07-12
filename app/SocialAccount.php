<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = ['id', 'provider_user_id', 'provider'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
