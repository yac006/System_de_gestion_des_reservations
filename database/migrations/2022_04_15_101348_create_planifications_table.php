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
            $table->integer('num_rsv');
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('type_client');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('type_rsv');
            $table->integer('tele');
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
