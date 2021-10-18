<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EtiquetteHotel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquette_hotel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etiquette_id');
            $table->foreign('etiquette_id')
                ->references('id')
                ->on('etiquettes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')
                ->references('id')
                ->on('hotels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('etiquette_hotel');
    }
}
