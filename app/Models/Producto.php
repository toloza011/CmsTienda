<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "productos";
    protected $fillable = ['id','nombre','descripcion','imagen','stock','estado','precio'];


   
    public function categorias(){
        return $this->belongstoMany('App\Models\Categoria','producto_categoria','producto_id','categoria_id');
    }

}
