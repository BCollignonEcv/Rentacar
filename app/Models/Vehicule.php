<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TypeVehicule;
use App\Models\TypeBoite;
use App\Models\TypeCarburant;
use App\Models\Marque;
use App\Models\ControleConformite;
use App\Models\ControleAP;



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

    public function controleConformites(){
        return $this->hasMany(ControleConformite::class, 'id_vehicule')->orderBy('id_controleConformite', 'desc');
    }

    public function controleAP(){   
        return $this->hasOne(ControleAP::class, 'id_vehicule')->latest();
    }
}
