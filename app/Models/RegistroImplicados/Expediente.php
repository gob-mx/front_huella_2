<?php

namespace App\Models\RegistroImplicados;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RegistroImplicados\CatEstatusInvestigacion;
use App\Models\RegistroImplicados\DomicilioDelito;
use App\Models\RegistroImplicados\Personas;

class Expediente extends Model
{
	protected $table = "expediente";
	// protected $primaryKey = 'admin_id';

	protected $fillable = [
		'carpeta_investigacion',
		'averiguacion_previa',
		'delito',
		'descripcion_delito',
		'total_implicados',
		'observaciones',
		'fecha_hechos',
		'fecha_registro',
		'estatus_investigacion_id',
	];

	public function EstatusInvestigacion()
	{
		return $this->hasOne(CatEstatusInvestigacion::class,'id','estatus_investigacion_id');
	}

	public function DomicilioDelito()
	{
		return $this->hasOne(DomicilioDelito::class,'carpeta_investigacion_id','id');
	}

	public function Personas()
	{
		return $this->belongsToMany(Personas::class,'implicados','carpeta_investigacion_id','persona_id');
	}
}