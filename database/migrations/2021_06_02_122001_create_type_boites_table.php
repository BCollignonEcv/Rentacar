<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeBoitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_boites', function (Blueprint $table) {
            $table->id('id_typeBoite');
            $table->string('nom_typeBoite');
            $table->timestamps();
        });

        DB::table('type_boites')->insert([
            ['nom_typeBoite' => 'Automatique'],
            ['nom_typeBoite' => 'Manuel']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_boites');
    }
}
