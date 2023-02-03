@extends('homelayout')
@section('contenido')
<div class="container">
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
    <form action="{{route('productos.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
        <label name="skue" class="form-label">sku</label>
        <input type="text" class="form-control" name="sku"  value="{{old('sku')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">descripcion</label>
            <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">precio</label>
            <input type="number" class="form-control" name="precio" value="{{old('precio')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">cantidad</label>
            <input type="number" class="form-control" name="cantidad" value="{{old('cantidad')}}">
        </div>
        <ul class="list-group" style="overflow:auto;height:400px;">
            @foreach($categorias as $categoria)
            <label>
                <li class="list-group-item">
                    <input type="checkbox" name="categoria_id[]" value="{{$categoria->id}}">
                    {{$categoria->descripcion}}
                </li>
            </label>
            @endforeach
        </ul>
        <button class="btn btn-success">enviar</button>
    </form>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <a href="{{route('productos.index')}}" class="btn btn-link">lista</a>
</div>
@endsection