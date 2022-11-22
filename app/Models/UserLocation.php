<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    use HasFactory;

    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}
