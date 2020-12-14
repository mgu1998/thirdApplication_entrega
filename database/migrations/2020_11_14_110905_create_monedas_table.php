<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneda', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre', 40);
            $table->string('simbolo', 5);
            $table->string('pais', 40);
            $table->decimal('valor', 8, 2);
            $table->date('fecha')->nullable();
            
            $table->timestamps();
            
            $table->unique(['nombre', 'pais']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moneda');
    }
}
