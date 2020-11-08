<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    # Columnas : NOMBRE, DESCRIPCION, IMAGEN, CATEGORIA_ID, NEGOCIO_ID, LATITUD, LONGITUD, DIRECCION, BANOS, HABITACIONES, ESTACIONAMIENTO
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
