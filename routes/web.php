<?php

use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/home','HomeController@index')->name('home');
Route::get('/','HomeController@index');

/* Rutas de los productos */
Route::get('/productos','ProductosController@index')->name('productos.index');
Route::get('/productos/crear','ProductosController@crearProducto')->name('productos.crear');
Route::post('/productos/crear','ProductosController@guardarProducto')->name('productos.store');
Route::get('/productos/editar/{id}','ProductosController@editarProducto')->name('productos.editar');
Route::post('/productos/actualizar/{id}','ProductosController@updateProducto')->name('productos.update');
Route::get('/productos/eliminar/{id}','ProductosController@eliminar')->name('productos.eliminar');
Route::get('/productos/crear/subcategorias/{id}','ProductosController@listaSubcategorias')->name('productos.subcategorias');

/** Rutas de las categorias */
Route::get('/categorias','CategoriasController@index')->name('categorias.index');
Route::get('/categorias/crear','CategoriasController@crearCategoria')->name('categorias.crear');
Route::post('/categorias/crear','CategoriasController@store')->name('categorias.store');
Route::get('/categorias/subcategorias/{id}','CategoriasController@subcategorias')->name('categorias.subcategorias');
Route::get('/categorias/editar/{id}','CategoriasController@editarCategoria')->name('categoria.editar');
Route::post('/categorias/actualizar/{id}','CategoriasController@actualizarCategoria')->name('categoria.update');
Route::get('/categorias/eliminar/{id}','CategoriasController@eliminarCategoria')->name('categoria.delete');
Route::get('/subcategoria/editar/{id}','CategoriasController@editarSubcategoria')->name('subcategoria.editar');
Route::post('/subcategoria/actualizar/{id}','CategoriasController@actualizarSubcategoria')->name('subcategoria.update');

