<?php
    $productoCategorias = $producto->categorias->pluck('id');
?>
@extends('homelayout')
@section('contenido')
<div class="container">
    <h2>Editar producto {{$producto->nombre}}</h2>
    <a href="{{route('productos.index')}}" class="btn btn-link">lista</a>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class = "alert alert-error">                      
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div> 
    <form action="{{route('productos.update', [$producto->id])}}" method="POST">
        @csrf
        {{ method_field('PATCH') }}
        <div class="mb-3">
        <label name="skue" class="form-label">sku</label>
        <input type="text" class="form-control" name="sku"  value="{{old('sku', $producto->sku)}}">
        </div>
        <div class="mb-3">
            <label class="form-label">nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{old('nombre', $producto->nombre)}}">
        </div>
        <div class="mb-3">
            <label class="form-label">descripcion</label>
            <input type="text" class="form-control" name="descripcion" value="{{old('descripcion', $producto->descripcion)}}">
        </div>
        <div class="mb-3">
            <label class="form-label">precio</label>
            <input type="number" class="form-control" name="precio" value="{{old('precio', $producto->precio)}}">
        </div>
        <div class="mb-3">
            <label class="form-label">cantidad</label>
            <input type="number" class="form-control" name="cantidad" value="{{old('cantidad', $producto->cantidad)}}">
        </div>
        <ul class="list-group" style="overflow:auto;height:400px;">
            @foreach($categorias as $categoria)
            <label>
                <li class="list-group-item">
                    <input type="checkbox" name="categoria_id[]" {{old('categoria_id', $productoCategorias->contains($categoria->id))?'checked':''}} value="{{$categoria->id}}">
                    {{$categoria->descripcion}}
                </li>
            </label>
            @endforeach
        </ul>
        <div class="mb-3">
            <label class="form-label">calidad</label>
            <select class="form-select" aria-label="Default select example" name="calificacion">
                @for($i=1;$i<=5;$i++)
                    <option value="{{$i}}" {{$i == old('calificacion', $producto->calificacion)?'selected':''}}>estrellas - {{$i}}</option>
                @endfor
        </select>
        </div>
        <input type="submit" value="enviar">
    </form>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div>
@endsection