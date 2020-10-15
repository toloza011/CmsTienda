@extends('adminlte::page')

@section('title', 'CMS Tienda - Agregar Producto')

@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header bg-danger">
                        <div class="text-center">
                            <h2>Agregar Producto</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('productos.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre: </label>
                                        <input type="text" class="form-control"
                                            placeholder="Ingrese el nombre del producto" value="{{old('nombre')}}" name="nombre" id="nombre">
                                            @error('nombre')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        @error('nombre')
                                      
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion: </label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30"
                                            style="max-height: 200px; min-height:100px" rows="4"
                                            placeholder="Ingresa alguna descripcion"
                                            value="{{old('descripcion')}}"
                                            >{{old('descripcion')}}</textarea>
                                            @error('descripcion')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tags" class="control-label">Categorias: </label>
                                        <select class="form-control tags" lang="es" name="tags[]" multiple="multiple">
                                           @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                           @endforeach
                                        </select>
                                        @error('tags')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" placeholder="Ingrese el stock" value="{{old('stock')}}" class="form-control"
                                            name="stock" id="stock">
                                            @error('stock')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="imageref">
                                            <img width="100%" height="245px"  src="{{asset('img/404.svg')}}" id="img1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input id="inputFile1" name="imagen" value="{{old('imagen')}}" type="file" class="form-control">
                                        @error('imagen')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input type="number" placeholder="Ingrese el precio del producto"
                                            class="form-control" value="{{old('precio')}}"  name="precio" id="precio">
                                            @error('precio')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row subcategorias" >
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label for="subs">Agregar Subcategorias</label>
                                       <select class="form-control subs" lang="es" name="subs[]" multiple="multiple">
                                           
                                       </select>
                                   </div>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <button id="btn-sub" class="btn btn-danger btn-block ">Agregar subcategorias</button>
                                </div>
                                <div class="col-md-6 offset-1">
                                    <button type="submit" class="btn btn-success btn-block">Agregar Producto</button>
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

@stop
@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('js/productos.js')}}"></script>

  

@stop
