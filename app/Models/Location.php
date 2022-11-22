<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'lat',
        'long',
    ];    

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

}
