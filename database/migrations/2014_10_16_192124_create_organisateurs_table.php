<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisateurs', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2014_10_16_192124_create_organisateurs_table.php
           $table->string("nom");
            $table->string("adresse")->nullable();
            $table->integer("contact")->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            //clé étrangère pour user
=======
            $table->string("nom");
            $table->string("prenom");
            $table->string("adresse");
            $table->integer("contact");
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

>>>>>>> a52993f6beda22b9b25c67a9de8d68c57998ca8e:database/migrations/2021_08_16_192124_create_organisateurs_table.php
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
        Schema::dropIfExists('organisateurs');
    }
}
