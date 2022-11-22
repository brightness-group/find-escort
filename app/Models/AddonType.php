<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddonType extends Model
{
    use HasFactory;

    public function addons()
    {
        return $this->hasMany(Addon::class);
    }
}
