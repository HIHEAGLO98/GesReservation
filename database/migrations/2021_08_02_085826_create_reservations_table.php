<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('participant_id');
            $table->unsignedBigInteger('evenement_id');
            $table->timestamps();
            //clé étrangère pour participant
            $table->foreign('participant_id')
            ->references('id')
            ->on('participants')
            ->onDelete('cascade');
            //clé étrangère pour event
            $table->foreign('evenement_id')
            ->references('id')
            ->on('evenements')
            ->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("reservations",function(Blueprint $table){
            $table->dropForeignId("user_id");
            $table->dropForeign("evenement_id");

        });
        Schema::dropIfExists('reservations');
    }
}
