<?php
    use App\Models\Categoria;
?>
@extends('vue')
@section('contenido')
    <create-component />
@endsection
@section('script')
    <script>
        @php
            $categorias = Categoria::all();
            $categoriaProducto = $producto->categoriaProducto->pluck('categoria_id');
        @endphp
        var categorias = <?=json_encode($categorias); ?>;
        var producto = <?=json_encode($producto); ?>;
        var categoriaProducto = <?=json_encode($categoriaProducto); ?>;
    </script>
@endsection