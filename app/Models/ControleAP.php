<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleAP extends Model
{
    use HasFactory;

    protected $table = 'controle_aps';
    protected $primaryKey = 'id_controleAP';
}
