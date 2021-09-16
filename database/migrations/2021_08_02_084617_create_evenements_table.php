<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("description");
            $table->string("adresse");
            $table->integer("nombre_place");
            $table->date("datedebut");
            $table->date("datefin");
            $table->time("heuredebut");
            $table->time("heurefin");
            $table->unsignedBigInteger('salle_id');
            $table->unsignedBigInteger('type_evenement_id');
            $table->unsignedBigInteger('organisateur_id');
             //contrainte de clé étrangère pour type d'événement
           
            $table->foreign('type_evenement_id')
             ->references('id')
             ->on('type_evenements')
             ->onDelete('cascade')
             ->onUpdate('cascade');
            
            //clé étrangère pour salle
            $table->foreign('salle_id')
            ->references('id')
            ->on('salles')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('organisateur_id')
            ->references('id')
            ->on('organisateurs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            

             $table->timestamps();
        });
        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("evenements",function(Blueprint $table){
            $table->dropConstrainedForeignId("type_evenement_id");
            $table->dropConstrainedForeignId("salle_id");
            $table->dropConstrainedForeignId("organisateur_id");
        });
        Schema::dropIfExists('evenements');
    }
}
