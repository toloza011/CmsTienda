@extends('adminlte::page')

@section('title', 'CMS Tienda')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="text-center">
            <h2>Bienvenid@ {{Auth::user()->name}}</h2>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop