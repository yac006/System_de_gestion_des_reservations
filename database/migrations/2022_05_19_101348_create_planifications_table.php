<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planifications', function (Blueprint $table) {
            $table->id('id_pln');
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('num_demande');
            $table->foreign('num_demande')->references('num_demande')->on('demandes');
            $table->unsignedBigInteger('num_emp');
            $table->foreign('num_emp')->references('num_emp')->on('employes');

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
        Schema::dropIfExists('planifications');
    }
}
