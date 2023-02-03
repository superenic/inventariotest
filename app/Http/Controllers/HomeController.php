<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProductoStoreRequest;
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
        ]);
        $Producto = new Producto();
        $Producto->sku = $data['sku'];
        $Producto->nombre = $data['nombre'];
        $Producto->descripción = $data['descripcion'];
        $Producto->precio = $data['precio'];
        $Producto->cantidad = $data['cantidad'];
        $categoria_id = $request->get('categoria_id');
 
        DB::transaction(function () use ($Producto, $categoria_id) {
            $Producto->saveOrFail();
            $vs= [];
            foreach($categoria_id as $id) {
                $vs[] = ['producto_id' => $Producto->id, 'categoria_id' => $id];
            }
            CategoriaProducto::insert($vs);
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
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
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
