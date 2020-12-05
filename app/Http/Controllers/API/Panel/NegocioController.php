<?php

namespace App\Http\Controllers\API\Panel;

use App\Http\Controllers\Controller;
use App\Negocio;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $negocios = Negocio::all();

        return response()->json($negocios);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable'
        ]);

        $negocio = Negocio::create($request->all());

        return response()->json($negocio,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function show(Negocio $negocio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negocio $negocio)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable'
        ]);

        $negocio->update($request->all());

        return response($negocio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Negocio $negocio)
    {
        $negocio->delete();
        return response()->json(['mensaje'=> 'Eliminado correctamente'], 201);
    }
}
