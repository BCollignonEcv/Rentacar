<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleConformite extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_controleConformite';

    /**
     * Return globale statut of vehicule.
     *
     * @param  Array $attrs
     * @return Boolean
     */
    public static function getStatut($attrs){
        $n = 0;
        $sum = 0;
        foreach ($attrs as $k => $v) {
            $n++;
            $sum += $v;
        }
        $statut = $sum / $n;
        return $statut > 5;
    }
}
