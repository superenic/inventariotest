<?php
use App\Models\Producto;
?>
@extends('homelayout')
@section('contenido')
<div class="text-end"><a href="{{route('productos.create')}}" class="btn btn-success" style="margin: 20px;">nuevo</a></div>
<div class="container">
@foreach($productos as $producto)
    <div class="row fondo-blanco">
        <div class="col text-center">
            <img src="{{ url('images\r.jpeg')}}" alt="reloj" height="200">
        </div>
        <div class="col-6">
            <h2>{{$producto->nombre}}</h2>
            <div>by Apple</div>
            <div>{{$producto->estado}}</div>

            <label class="form-label">calidad</label>
            <select class="form-select" aria-label="Default select example" name="calificacion" data-ruta="{{route("put.calificacion", [$producto->id])}}">
                @for($i=1;$i<=5;$i++)
                    <option value="{{$i}}" {{$i == old('calificacion', $producto->calificacion)?'selected':''}}>estrellas - {{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="col">
            <h3 class="text-center">${{$producto->precio}}</h3>
            @if($producto->estado == Producto::ESTADO_VALIDO[0])
                <div class="alert alert-success text-center">{{$producto->estado}}</div>
            @else
                <div class="alert alert-danger text-center">{{$producto->estado}}</div>
            @endif
            <a href="{{route('productos.edit', [$producto->id])}}" class="btn btn-info w-100 btn-large">editar</a>
            <a href="{{route('productos.destroy', [$producto->id])}}" class="btn btn-danger w-100 btn-large">eliminar</a>
        </div>
    </div>
@endforeach
</div>

<script src="{{mix('js/app.js')}}"></script>
@endsection