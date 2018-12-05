<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $fillable = ['nombre', 'categoria'];

    public function category() {
    	return $this->belongsTo(Category::class, 'categoria');
    }

    public function stock() {
    	return $this->hasOne('App\Stock','id_item','id');
    }
}
