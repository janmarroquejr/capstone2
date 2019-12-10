<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
	public function menu_orders(){
		return $this->belongsTo('\App\MenuOrder');
	}

	public function booking(){
		return $this->belongsTo('\App\Booking');
	}
}
