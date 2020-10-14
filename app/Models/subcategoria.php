<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategoria extends Model
{
    use HasFactory;
    protected $table = "subcategorias";
    protected $fillable = ['nombre','descripcion'];
    public $timestamps = false;

    public function categoria(){
        return $this->belongsToMany('App\Models\categoria','categorias_subcategorias','id_subcategoria','id_categoria');
    }
}
