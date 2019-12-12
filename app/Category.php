<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function menu_items(){
    	return $this->hasMany('\App\MenuItem');
    }
}
