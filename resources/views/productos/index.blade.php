@extends('homelayout')
@section('contenido')
    <div  class="text-end"><a href="{{route('productos.create')}}" class="btn btn-success">nuevo</a></div>
    <table class="table">
        <thead>
            <th>sku</th>
            <th>categorias</th>
            <th>inventario</th>
            <th>calificacion</th>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>
                    <a class="btn btn-link" href="{{route('productos.show', ['producto' => $producto->id])}}">{{$producto->sku}}</a></td>
                <td>{{$producto->nombre}}</td>
                <td>
                    <ul>
                        @foreach($producto->categorias as $categoria)
                        <li>{{$categoria->descripcion}}</li>
                        @endforeach
                    </ul>
                    
                </td>
                <td>{{$producto->estado}}</td>
                <td>
                    <a href="{{route('productos.edit', [$producto->id])}}" class="btn btn-info">editar</a>
                    <a href="{{route('productos.destroy', [$producto->id])}}" class="btn btn-danger">eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection