<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\producto;

class CrearProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Producto::NAME_TABLE, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sku');
            $table->string('nombre');
            $table->bigInteger('categoria_id')->unsigned()->default(null)->nullable();
            $table->string('descripcion');
            $table->decimal('precio',8,2)->default(null)->nullable();
            $table->double('cantidad')->default(0)->nullable();
            $table->enum('estado', Producto::ESTADO_VALIDO)->default(Producto::ESTADO_VALIDO[1]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Producto::NAME_TABLE);
    }
}
