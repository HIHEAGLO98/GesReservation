<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
<<<<<<< HEAD
            //$table->string("prenom");
            $table->unsignedBigInteger('user_id');
            $table->integer("telephone")->nullable();
=======
            $table->string("prenom");
            $table->integer("telephone");
            $table->unsignedBigInteger('user_id');
>>>>>>> a52993f6beda22b9b25c67a9de8d68c57998ca8e
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
