<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControleConformitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controle_conformites', function (Blueprint $table) {
            $table->id('id_controleConformite');
            $table->integer('id_vehicule');
            $table->boolean('statut');
            $table->integer('etat_pneu');
            $table->integer('etat_frein');
            $table->integer('etat_moteur');
            $table->integer('etat_feu');
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
        Schema::dropIfExists('controle_conformites');
    }
}
