<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use app\Models\TypeVehicule;
use app\Models\TypeBoite;
use app\Models\TypeCarburant;
use app\Models\Marque;



class Vehicule extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_vehicule';

    public function typeVehicule(){
        return $this->belongsTo(TypeVehicule::class, 'id_typeVehicule')->withDefault([
            'nom_typeVehicule' => 'Type Inconnu',
        ]);
    }

    public function typeBoite(){
        return $this->belongsTo(TypeBoite::class, 'id_typeBoite')->withDefault([
            'nom_typeBoite' => 'Boite Inconnue',
        ]);
    }

    public function typeCarburant(){
        return $this->belongsTo(TypeCarburant::class, 'id_typeCarburant')->withDefault([
            'nom_typeCarburant' => 'Carburant Inconnu',
        ]);
    }

    public function marque(){
        return $this->hasOne(Marque::class, 'id_marque');
    }
}
