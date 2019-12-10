<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuOrder extends Model
{
	public function food_orders(){
		return $this->hasMany('\App\FoodOrder');
	}

	public function menu_items(){
		return $this->hasMany('\App\MenuItem');
	}
}
