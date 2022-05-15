<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id('num_emp');
            $table->string('nom_emp');
            $table->string('prenom_emp');
            $table->string('poste');
            $table->string('type');
            $table->string('tele');
            $table->unsignedBigInteger('num_secteur');
            $table->foreign('num_secteur')->references('num_secteur')->on('secteurs');
            $table->unsignedBigInteger('prfl_id');
            $table->foreign('prfl_id')->references('prfl_id')->on('profiles');

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
        Schema::dropIfExists('employer');
    }
}
