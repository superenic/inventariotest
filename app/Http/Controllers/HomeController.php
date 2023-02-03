<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;
use App\Models\Categoria;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::select(['id', 'descripcion'])->get();

        return view('productos.create', compact('categorias'));
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

        return redirect()->back()->with('message', 'el registro fue salvado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::select(['id', 'descripcion'])->get();

        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

        return redirect()->back()->with('message', 'el registro fue salvado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
