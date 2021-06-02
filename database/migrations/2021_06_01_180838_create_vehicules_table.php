<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id('id_vehicule');
            $table->string('nom');
            $table->float('tarif');
            $table->integer('annee');
            $table->integer('nb_place');
            $table->integer('id_marque');
            $table->integer('id_typeVehicule');
            $table->integer('id_typeBoite');
            $table->integer('id_typeCarburant');
            $table->integer('age_minimum');
            $table->string('img');
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
        Schema::dropIfExists('vehicules');
    }
}
