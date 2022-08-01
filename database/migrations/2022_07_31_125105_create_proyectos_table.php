<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('proyecto_nombre', 255);
            $table->boolean('proyecto_estado');
            $table->date('proyecto_duracion');
            $table->decimal('proyecto_presupuesto', $precision = 8, $scale = 2);
            $table->timestamps();

            $table->foreignId('empresa_id')
            ->nullable()
            ->constrained('empresas')
            ->cascadeOnUpdate()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
