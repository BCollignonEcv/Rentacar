<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_vehicules', function (Blueprint $table) {
            $table->id('id_typeVehicule');
            $table->string('nom_typeVehicule');
            $table->timestamps();
        });

        DB::table('type_vehicules')->insert([
            ['nom_typeVehicule' => 'Utilitaire'],
            ['nom_typeVehicule' => 'Leger']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_vehicules');
    }
}
