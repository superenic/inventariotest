<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class VueController extends Controller
{
    public function index()
    {
        return view('vue.index');
    }

    public function create()
    {
        return view('vue.create');
    }

    public function edit()
    {
        return view('vue.edit');
    }

    public function show($productoId)
    {
        $producto =  Producto::findOrfail($productoId);

        return view('vue.show', compact('producto'));
    }
}
