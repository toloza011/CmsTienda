@extends('adminlte::page')

@section('title', 'CMS Tienda - Crear Categoria')



@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header bg-danger">
                        <div class="text-center">
                            <h2>Agregar Categoria</h2>
                        </div>
                    </div>
                    @if(isset($alerta_categoria))
                    <div class="alert alert-success" role="alert">
                        {{$alerta_categoria}}
                    </div>
                  @endif
                    @if(isset($alerta_categoria))
                      <div class="alert alert-success" role="alert">
                          {{$alerta_categoria}}
                      </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('categorias.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-8 offset-2">
                                    <div class="form-group">
                                        <label for="nombre">Nombre: </label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion: </label>
                                        <textarea name="descripcion" class="form-control" id="" cols="10" rows="2" placeholder="Cree una descripcion"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo">Subcategoria?</label>
                                        <input type="checkbox" class="ml-3 mt-2" name="tipo" id="tipo"  >
                                    </div>
                                    <div class="form-group" id="categorias" style="display: none">
                                         <label for="categoria">Categoria Padre: </label>
                                         <select name="categoria" id="categoria" class="form-control">
                                             @foreach($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                             @endforeach
                                         </select>
                                    </div>
                                     
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-success btn-block">Agregar Categoria</button>
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
<script src="{{asset('js/categorias.js')}}"></script>
@endsection