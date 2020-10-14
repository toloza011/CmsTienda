<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_categoria', function (Blueprint $table) {
              $table->integer('producto_id')->unsigned();
              $table->integer('categoria_id')->unsigned();
              
              $table->foreign('producto_id')->references('id')->on('productos');
              $table->foreign('categoria_id')->references('id')->on('categorias');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_categorias');
    }
}
