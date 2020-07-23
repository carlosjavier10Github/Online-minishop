<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'name', 'brand', 'price',
	];


	public function details(){

		        return $this->hasMany('App\Detail');
	}

	public function images(){

		        return $this->hasMany('App\Image');
	}



}
