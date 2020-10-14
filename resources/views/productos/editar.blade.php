@extends('adminlte::page')

@section('title', 'CMS Tienda - Productos')

@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header bg-danger">
                        <div class="text-center">
                            <h2>Editar Producto</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('productos.update',$producto->id)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre: </label>
                                        <input type="text" class="form-control"
                                         placeholder="Ingrese el nombre del producto" value="{{$producto->nombre}}" required name="nombre" id="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion: </label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" required cols="30"
                                            style="max-height: 200px; min-height:100px" rows="4"
                                            placeholder="Ingresa alguna descripcion"
                                            value="{{$producto->descripcion}}"
                                            >{{$producto->descripcion}}</textarea>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="tags" class="control-label">Tags</label>
                                        <select class="form-control tags" lang="es" name="tags[]" required multiple="multiple">
                                         @foreach($categorias as $categoria)
                                          <option value={{$categoria->id}} 
                                           @foreach($producto_categoria as $p_categoria) 
                                           @if($p_categoria->nombre == $categoria->nombre)
                                            selected
                                            @endif
                                           @endforeach 
                                           >
                                           {{$categoria->nombre}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" placeholder="Ingrese el stock" required class="form-control"
                                    name="stock" id="stock" value="{{$producto->stock}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="imageref">
                                        <img width="100%" height="245px"  src="{{asset('img/productos/'.$producto->imagen.'')}}" id="img1">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="imagen">Actualizar imagen</label>
                                        <input id="inputFile1" name="imagenr" type="file" class="form-control file-input">
                                    </div>
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input type="number" placeholder="Ingrese el precio del producto"
                                        class="form-control" value="{{$producto->precio}}" required name="precio" id="precio">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-success btn-block">Actualizar Producto</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@stop










@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('css/estilos.css')}}" rel="stylesheet" />
@stop
@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('js/productos.js')}}"></script>

@stop