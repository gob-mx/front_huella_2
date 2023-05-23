<?php

namespace App\Models\RegistroImplicados;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RegistroImplicados\CarpetaInvestigacion;

class CatEstatusInvestigacion extends Model
{
	protected $table = "cat_estatus_investigacion";

	protected $fillable = [
		'estatus_carpeta',
		'activo',
	];

	// public function CarpetaInvestigacion()
	// {
	//     return $this->belongsTo(CarpetaInvestigacion::class,'carpeta_investigacion','estatus_investigacion_id');
	// }
}