<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
	// public function menu_orders(){
	// 	return $this->belongsTo('\App\MenuOrder');
	// }
	public function menuItems(){
		return $this->belongsToMany('\App\MenuItem', 'menu_orders')->withPivot('price', 'quantity')->withTimestamps();
	}

	public function booking(){
		return $this->belongsTo('\App\Booking');
	}
}
