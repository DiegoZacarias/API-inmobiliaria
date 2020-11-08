<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $guarded = [];
    public function categoria()
    {
    		return $this->belongsTo(Categoria::class);
    }

    public function negocio()
    {
    		return $this->belongsTo(Negocio::class);
    }

    public function imagenesSecundarias()
    {
    		return $this->hasMany(ImagenProducto::class);
    }
}
