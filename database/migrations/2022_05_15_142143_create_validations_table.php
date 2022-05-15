<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validations', function (Blueprint $table) {
            $table->id();
            $table->date('date_val');
            $table->boolean('valider');
            $table->unsignedBigInteger('num_emp');
            $table->foreign('num_emp')->references('num_emp')->on('employes');
            $table->unsignedBigInteger('num_demande');
            $table->foreign('num_demande')->references('num_demande')->on('demandes');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validations');
    }
}
