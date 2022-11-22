<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
  	
  	protected static function boot()
	{
	    parent::boot();

	    // Order by name ASC
	    static::addGlobalScope('order', function (Builder $builder) {
	        $builder->orderBy('name', 'asc');
	    });
	}

	public function state(){
	     return $this->belongsTo(State::class);
	}
}
