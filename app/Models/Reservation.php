<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use app\models\Vehicule;
use app\models\Client;
use app\models\ControleAV;
use app\models\ControleAP;
use app\models\Contrat;


class Reservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_reservation';

    public function vehicule(){
        return $this->belongsTo(Vehicule::class, 'id_vehicule');
    }

    public function client(){
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function controleAV(){
        return $this->belongsTo(ControleAV::class, 'id_controleAvant');
    }

    public function controleAP(){
        return $this->belongsTo(ControleAP::class, 'id_controleApres');
    }

    public function contrat(){
        return $this->belongsTo(Contrat::class, 'id_contrat');
    }

}
