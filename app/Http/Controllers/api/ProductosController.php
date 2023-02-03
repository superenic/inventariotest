<?php

namespace App\Http\Controllers\api;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;
use App\Http\Requests\ProductoUpdateCalificaionRequest;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "pending view";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoStoreRequest $request)
    {
        $data = $request->only([
            'sku',
            'nombre',
            'categoria_id',
            'descripcion',
            'precio',
            'cantidad',
            'estado',
        ]);
        $Producto = new Producto();
        $Producto->fill($data);
        $Producto->saveOrFail();

        return $Producto->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $Producto)
    {
        return $Producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $Producto)
    {
        return 'pending';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoUpdateRequest $request, Producto $Producto)
    {
        $data = $request->only([
            'sku',
            'nombre',
            'categoria_id',
            'descripcion',
            'precio',
            'cantidad',
            'estado',
        ]);
        $Producto->fill($data);
        $Producto->saveOrFail();

        return $Producto->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $Producto)
    {
        //
    }

    public function putCalificacion(Producto $producto, ProductoUpdateCalificaionRequest $request)
    {
        $producto->calificacion =  $request->get('calificacion');
        $producto->saveOrFail();

        return response()->noContent();
    }
}
