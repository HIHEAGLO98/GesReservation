<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salles', function (Blueprint $table) {
            $table->id();
            $table->string("libelle_salle");
            $table->timestamps();
             //clé étrangère pour ville
             $table->foreignId('ville_id')
             ->constrained('villes')
             ->onUpdate('cascade')
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
        Schema::table("salles",function(Blueprint $table){
            $table->dropConstrainedForeignId("ville_id");

        });

        Schema::dropIfExists('salles');
    }
}
