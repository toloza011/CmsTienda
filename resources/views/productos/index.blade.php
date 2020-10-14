@extends('adminlte::page')

@section('title', 'CMS Tienda - Productos')



@section('content')
<div class="container">
    <div class="text-center">
        <h2>Listado de productos</h2>
    </div>
    <div class="col-md-12 mt-3">
        <table class="table table-striped table-inverse table-responsive-md" id="table-productos">
            <thead class="thead thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Categorias</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>
                        {{$producto->id}}
                    </td>
                    <td>
                        <img src="img/productos/{{$producto->imagen}}" style="height:120px; width:200px" alt="">
                    </td>
                    <td>
                        {{$producto->nombre}}
                    </td>
                    <td>
                        {{$producto->descripcion}}

                    </td>
                    <td>
                        {{$producto->stock}}
                    </td>
                    <td>
                        $ {{$producto->precio}}
                    </td>
                    <td>
                        <ul>
                        @foreach($producto->categorias as $categoria)
                          <li> <b>{{$categoria->nombre}}</b> </li>
                          @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="btn-group mt-3">
                            <a  id="delete-product" class="btn btn-danger"  href="{{route('productos.eliminar',$producto->id)}}">Eliminar</a>
                            <a href="{{route('productos.editar',$producto->id)}}" id="edit-product" class="btn btn-success">Editar</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="{{asset('js/listaProductos.js')}}"></script>
@stop