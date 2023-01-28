<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('num_notif');
            $table->string('id');
            $table->string('type');
            $table->morphs('notifiable');
            $table->json('data');
            $table->string('read_at')->nullable();
            $table->BigInteger('num_demande')->nullable();
            $table->foreign('num_demande')->references('num_demande')->on('demandes');

            $table->string('created_at');
            $table->string('updated_at');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
