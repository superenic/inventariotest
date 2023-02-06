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
        @endphp
        var categorias = <?=json_encode($categorias); ?>
    </script>
@endsection