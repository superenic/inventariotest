@extends('homelayout')
@section('contenido')
<ul>
    <li>sku: {{$producto->sku}}</li>
    <li>nombre: {{$producto->nombre}}</li>
    <li>descripción: {{$producto->descripción}}</li>
    <li>precio: {{$producto->precio}}</li>
    <li>cantidad: {{$producto->cantidad}}</li>
    <li>estado: {{$producto->estado}}</li>
</ul>
<a href="{{route('productos.index')}}" class="btn btn-link">lista</a>
@endsection