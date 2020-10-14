@extends('adminlte::page')

@section('title', 'CMS Tienda - Categorias')



@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Categorias</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="table-categorias" class="table table-striped table-inverse">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $categoria)
                            <tr>
                            <td scope="row" width="10%">{{$categoria->id}}</td>
                            <td width="20%">{{$categoria->nombre}}</td>
                            <td width="30%">{{$categoria->descripcion}}</td>
                                <td width="10%">
                                    <div class="btn-group mt-3">
                                    <a href="{{route('categoria.delete',$categoria->id)}}" id="delete-product" class="btn btn-danger" >Eliminar</a>
                                    <a href="{{route('categoria.editar',$categoria->id)}}" id="edit-product" class="btn btn-success">Editar</a>
                                    <a href="{{route('categorias.subcategorias',$categoria->id)}}" id="add-subcategoria" class="btn btn-dark">Subcategorias</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@stop
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('js/listaCategorias.js')}}"></script>

@endsection