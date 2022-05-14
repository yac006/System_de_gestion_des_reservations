<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsvSallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsv_salles', function (Blueprint $table) {
            $table->id('id_rsv_sal');
            $table->string('theme');
            $table->date('date_rsv');
            $table->time('heur_d');
            $table->time('heur_f');
            $table->unsignedBigInteger('num_demande');
            $table->foreign('num_demande')->references('num_demande')->on('demandes');
            $table->unsignedBigInteger('num_sal');
            $table->foreign('num_sal')->references('num_sal')->on('salles');

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
        Schema::dropIfExists('rsv_salles');
    }
}
