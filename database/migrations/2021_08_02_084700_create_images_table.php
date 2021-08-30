<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string("path");
           
            //clé étrangère pour evenement
            $table->unsignedBigInteger('evenement_id');
            $table->foreign('evenement_id')
             ->references('id')
             ->on('evenements')
             ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
           
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
        Schema::table("images",function(Blueprint $table){
            $table->dropConstrainedForeignId("evenement_id");
           // $table->dropConstrainedForeignId("evenement_id");
        });
        Schema::dropIfExists('images');
    }
}
