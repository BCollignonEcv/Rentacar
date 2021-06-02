<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeCarburantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_carburants', function (Blueprint $table) {
            $table->id('id_typeCarburant');
            $table->string('nom_typeCarburant');
            $table->timestamps();
        });

        DB::table('type_carburants')->insert([
            ['nom_typeCarburant' => 'Essence'],
            ['nom_typeCarburant' => 'GPL'],
            ['nom_typeCarburant' => 'Diesel']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_carburants');
    }
}
