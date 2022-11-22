<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected static function boot()
	{
	    parent::boot();

	    // Order by name ASC
	    static::addGlobalScope('order', function (Builder $builder) {
	        $builder->orderBy('id', 'desc');
	    });
	}

    public function user()
	{
	  return $this->belongsTo(User::class);
	}

    public function scopePending($query)
    {
        return $query->where('status', 1);
    }
}
