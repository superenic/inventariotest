<?php

use App\Models\CategoriaProducto;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCategoriasProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CategoriaProducto::NAME_TABLE, function (Blueprint $table) {
            $table->timestamps();        
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('producto_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(CategoriaProducto::NAME_TABLE);
    }
}
