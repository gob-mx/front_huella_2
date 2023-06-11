<?php

namespace App\Models\RegistroImplicados;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HuellasTemp extends Model {

    use HasFactory;

    protected $table = "huellas_temp";
    
    protected $fillable = [
        "id",
        "persona_id",
        "token_pc",
        "nombre_dedo",
        "imagen",
        "huella_dactilar",
        "option",
        "nombre",
        "persona_id_numero",
        "texto",
        "created_at",
        "updated_at",
    ];

}
