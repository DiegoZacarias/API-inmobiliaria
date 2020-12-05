<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
		protected $guarded = [];
		# Relation methods
    public function productos()
    {
    		return $this->hasMany(Producto::class);
    }
}
