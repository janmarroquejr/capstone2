<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
	use SoftDeletes;
	
	public function category(){
    	return $this->belongsTo('\App\Category');
	}

	public function food_orders(){
		return $this->belongsToMany('\App\FoodOrder', 'menu_orders')->withPivot('quantity', 'price')->withTimestamps();
	}
		
}
