<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("lib_ticket");
            $table->string("mode_paiement");
            $table->timestamps();

             //clé étrangère pour type de ticket
             $table->foreignId('type_ticket_id')
             ->constrained('type_tickets')
             ->onUpdate('cascade')
             ->onDelete('cascade');

         //clé étrangère pour la table participant
         $table->foreignId('participant_id')
             ->constrained('participants')
             ->onUpdate('cascade')
             ->onDelete('cascade');

         //clé étrangère pour événement
         $table->foreignId('evenement_id')
             ->constrained('evenements')
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
        Schema::table("tickets",function(Blueprint $table){
            $table->dropForeign("type_ticket_id");
            $table->dropForeignId("participants_id");
            $table->dropForeign("evenement_id");

        });
        Schema::dropIfExists('tickets');
    }
}
