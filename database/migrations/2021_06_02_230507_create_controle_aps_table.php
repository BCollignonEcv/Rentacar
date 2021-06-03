<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControleApsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controle_aps', function (Blueprint $table) {
            $table->id('id_controleAP');
            $table->integer('id_vehicule');
            $table->integer('etat_pneu');
            $table->integer('etat_frein');
            $table->integer('etat_moteur');
            $table->integer('etat_feu');
            $table->integer('etat_carrosserie');
            $table->integer('etat_peinture');
            $table->integer('etat_interieur');
            $table->integer('etat_retroviseur');
            $table->integer('noteGlobale');
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
        Schema::dropIfExists('controle_aps');
    }
}
