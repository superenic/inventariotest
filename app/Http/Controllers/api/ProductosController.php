<?php

namespace App\Http\Controllers\api;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\CategoriaProducto;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;
use App\Http\Requests\CambiarProductoCantidadRequest;
use App\Http\Requests\ProductoUpdateCalificaionRequest;

class ProductosController extends Controller
{
    public function cambiarCantidad(Producto $producto, CambiarProductoCantidadRequest $request)
    {
        $cantidad = $request->get('cantidad');
        $producto->cantidad = $cantidad;
        if ($producto->cantidad <= 0) {
            $producto->estado = Producto::ESTADO_VALIDO[1];
        } else {
            $producto->estado = Producto::ESTADO_VALIDO[0];
        }
        $producto->saveOrFail();

        return response()->noContent();        
    }

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
            'descripcion',
            'precio',
            'cantidad',
            'calificacion',
        ]);
        $Producto = new Producto();
        $Producto->sku = $data['sku'];
        $Producto->nombre = $data['nombre'];
        $Producto->descripcion = $data['descripcion'];
        $Producto->precio = $data['precio'];
        $Producto->cantidad = $data['cantidad'];
        if ($Producto->cantidad <= 0) {
            $Producto->estado = Producto::ESTADO_VALIDO[1];
        } else {
            $Producto->estado = Producto::ESTADO_VALIDO[0];
        }
        $Producto->calificacion = $data['calificacion'];
        $categoria_id = $request->get('categoria_id');
 
        DB::transaction(function () use ($Producto, $categoria_id) {
            $Producto->saveOrFail();
            $vs= [];
            if ($categoria_id) {
                foreach($categoria_id as $id) {
                    $vs[] = ['producto_id' => $Producto->id, 'categoria_id' => $id];
                }
                CategoriaProducto::insert($vs);
            }
        });

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
    public function update(ProductoUpdateRequest $request, Producto $producto)
    {
        $data = $request->only([
            'sku',
            'nombre',
            'descripcion',
            'precio',
            'cantidad',
            'calificacion',
        ]);
        $producto->sku = $data['sku'];
        $producto->nombre = $data['nombre'];
        $producto->descripcion = $data['descripcion'];
        $producto->precio = $data['precio'];
        $producto->cantidad = $data['cantidad'];
        if ($producto->cantidad <= 0) {
            $producto->estado = Producto::ESTADO_VALIDO[1];
        } else {
            $producto->estado = Producto::ESTADO_VALIDO[0];
        }
        $producto->calificacion = $data['calificacion'];
        $categoria_id = $request->get('categoria_id');
 
        DB::transaction(function () use ($producto, $categoria_id) {
            $producto->saveOrFail();
            $vs= [];
            if ($categoria_id) {
                foreach($categoria_id as $id) {
                    $vs[] = ['producto_id' => $producto->id, 'categoria_id' => $id];
                }
                CategoriaProducto::insert($vs);
            }
        });

        return $producto->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->noContent();
    }

    public function putCalificacion(Producto $producto, ProductoUpdateCalificaionRequest $request)
    {
        $producto->calificacion =  $request->get('calificacion');
        $producto->saveOrFail();

        return response()->noContent();
    }

    public function categorias() {
        return Categoria::all();
    }
}
