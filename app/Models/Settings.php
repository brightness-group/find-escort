<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = 'meta_key';
    protected $fillable = ['meta_key', 'meta_value'];
}
