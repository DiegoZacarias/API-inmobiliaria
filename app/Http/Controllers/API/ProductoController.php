<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct(Producto $productos)
    {
            $this->productos = $productos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->productos->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'nullable|file|image|mimetypes:image/jpeg,image/png,image/jpg',
            'direccion' => 'required',
            'banos' => 'required|integer',
            'habitaciones' => 'required|integer',
            'estacionamiento' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'negocio_id' => 'required|exists:negocios,id'
        ]);

        $producto = Producto::create($request->only('nombre','descripcion','direccion','banos','habitaciones','estacionamiento','categoria_id','negocio_id'));
    

        # Agregamos la imagen si la recibimos
        if ($request->hasFile('imagen')) {
            $this->storeImagenPrincipal($request,$producto);
        }

        return response()->json($producto, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $producto->update($request->all());

        return response()->json(['Exito' => 'Actualizado correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json(['Exito' => 'Producto eliminado con exito'], 204);
    }

    protected function storeImagenPrincipal($request, $producto)
    {
        $image_name = str_slug($producto->id).'_principal.' . $request->file('imagen')->getClientOriginalExtension();
        $producto->update([
            'imagen' => $request->file('imagen')
                                ->storeAs(
                                    'productos', $image_name,'public'
                                ),
        ]);

        return true;
    }
}
