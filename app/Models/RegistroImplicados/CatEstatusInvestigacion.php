<?php

namespace App\Models\RegistroImplicados;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RegistroImplicados\Expediente;

class CatEstatusInvestigacion extends Model
{
	protected $table = "cat_estatus_investigacion";

	protected $fillable = [
		'estatus_carpeta',
		'activo',
	];

	// public function Expediente()
	// {
	//     return $this->belongsTo(Expediente::class,'carpeta_investigacion','estatus_investigacion_id');
	// }
}