<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function item() {
    	return $this->belongsTo(Item::class, 'id_item');
    }

    public function casa() {
    	return $this->belongsTo(House::class, 'id_house');
    }

    public function usuario() {
    	return $this->belongsTo(User::class, 'usuario_modifica');
    }
}
