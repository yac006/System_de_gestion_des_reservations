<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsvVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsv_vehicules', function (Blueprint $table) {
            $table->id('id_rsv_vehc');
            $table->string('motif');
            $table->string('dest');
            $table->date('date_rsv');
            $table->date('date_dep');
            $table->date('date_est_retour');
            $table->string('heure_dep');
            $table->string('heure_retr');
            $table->boolean('chauffeur');

            $table->unsignedBigInteger('num_demande');
            $table->foreign('num_demande')->references('num_demande')->on('demandes');

            $table->unsignedBigInteger('id_vehc')->nullable();
            $table->foreign('id_vehc')->references('id_vehc')->on('vehicules');

            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->references('id_type')->on('type_vehicules');

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
        Schema::dropIfExists('rsv_vehicules');
    }
}
