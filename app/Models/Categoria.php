<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = "categorias";
    protected $fillable = ['id','nombre','descripcion'];
    public $timestamps = false;
    public function productos(){
        return $this->belongsToMany('App\Models\Producto','producto_categoria','categoria_id','producto_id');
    }
    public function subcategorias(){
        return $this->belongsToMany('App\Models\subcategoria','categorias_subcategorias','id_categoria','id_subcategoria');
    }
    
}
