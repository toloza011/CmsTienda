<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_subcategorias', function (Blueprint $table) {
           $table->integer('id_categoria')->unsigned();
           $table->integer('id_subcategoria')->unsigned();
           $table->foreign('id_categoria')->references('id')->on('categorias')->ondelete('cascade');
           $table->foreign('id_subcategoria')->references('id')->on('subcategorias')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_subcategorias');
    }
}
