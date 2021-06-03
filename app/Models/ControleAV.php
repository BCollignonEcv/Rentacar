<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleAV extends Model
{
    use HasFactory;

    protected $table = 'controle_avs';
    protected $primaryKey = 'id_controleAV';

}
