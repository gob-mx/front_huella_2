<?php

namespace App\Models\RegistroImplicados;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegistroImplicados\Personas;

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
        
    
    // Relacion uno a uno Inversa
    public function persona() {
        // return $this->belongsTo("App\Models\ResgistroImplicados\Personas");
        return $this->belongsTo(Personas::class, 'id','persona_id');
    }

}
