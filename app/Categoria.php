<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
		protected $guarded = [];

		# Relations methods
    public function productos()
    {
    		return $this->hasMany(Producto::class);
    }

    # Functional methods
    public function storeImagenPrincipal($request)
    {
		    	# Verificamos si no recibimos una imagen
		    	if (!$request->hasFile('imagen')) {
		    		return false;
		    	}

		  		$image_name = str_slug($this->id).'_categoria.' . $request->file('imagen')->getClientOriginalExtension();
		      $this->update([
		          'imagen' => $request->file('imagen')
		                              ->storeAs(
		                                  'categorias', $image_name,'public'
		                              ),
		      ]);

		      return true;
    }
}
