<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->id();
            $table->string("nom_ville");
            $table->timestamps();
             //clé étrangère pour pays
             $table->foreignId('pays_id')
             ->constrained('pays')
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
        Schema::table("villes",function(Blueprint $table){
            $table->dropConstrainedForeignId("pays_id");

        });
        Schema::dropIfExists('villes');
    }
}
