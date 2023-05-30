<?php

namespace App\Models\ResgitroImplicados;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huellas extends Model {

    use HasFactory;

    protected $table = "huellas";
    public $timestamps = false;
    
    protected $fillable = [
        "id",
        "nombre_dedo",
        "ruta_imagen",
        "huella_dactilar",
        "notificada",
        "persona_id"
    ];
        
    
    //Relacion uno a uno Inversa    
    public function persona() {
        return $this->belongsTo("App\Models\ResgitroImplicados\Personas");
    }

}
