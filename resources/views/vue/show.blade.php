@extends('vue')
@section('contenido')
    <show-component />
@endsection
@section('script')
    <script>
        var producto = <?=$producto->toJson(); ?>
    </script>
@endsection