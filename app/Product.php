<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $fillable = ['name'];

	public function descriptions()
	{
		return $this->hasMany(Description::class);
	}

	public function scopeOfProduct($query, $productId)
        {
                return $query->where('id', $productId);
        }

}
