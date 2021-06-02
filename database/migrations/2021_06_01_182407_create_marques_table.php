<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marques', function (Blueprint $table) {
            $table->id('id_marque');
            $table->string('nom_marque');
            $table->timestamps();
        });

        DB::table('marques')->insert([
            ['nom_marque' => 'Renault'],
            ['nom_marque' => 'Ford'],
            ['nom_marque' => 'Nissan'],
            ['nom_marque' => 'Peugeot'],
            ['nom_marque' => 'Opel'],
            ['nom_marque' => 'Volkswagen'],
            ['nom_marque' => 'Citroën'],
            ['nom_marque' => 'Fiat'],
            ['nom_marque' => 'Mercedes'],
            ['nom_marque' => 'Toyota']

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marques');
    }
}
