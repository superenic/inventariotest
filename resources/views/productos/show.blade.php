@extends('homelayout')
@section('contenido')
<a href="{{route('productos.index')}}" class="btn btn-link">lista</a>
<div class="container">
  <div class="row fondo-blanco">
    <div class="col text-center">
      <img src="{{ url('images\r.jpeg')}}" alt="reloj" height="200">
    </div>
    <div class="col-6">
      <h2>{{$producto->nombre}}</h2>
      <div>by Apple</div>
      <p>{{$producto->descripcion}}</p>
    </div>
  </div>
</div>
@endsection