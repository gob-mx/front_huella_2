<?php

namespace App\Models\RegistroImplicados;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\RegistroImplicados\CatEstatusInvestigacion;
// use App\Models\RegistroImplicados\DomicilioDelito;

class Personas extends Model
{
	protected $table = "personas";

	protected $fillable = [
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'alias',
		'rfc',
		'curp',
		'fecha_nacimiento',
		'estatura',
		'celular',
		'telefono',
		'nacionalidad',
		'pais_nacimiento',
		'lugar_nacimiento',
		'estudios',
		'ocupacion',
	];

	//Relacion uno a muchos
    public function huellas() {
           return $this->hasMany("App\Models\ResgitroImplicados\Huellas");
    }

	// public function EstatusInvestigacion()
	// {
	// 	return $this->hasOne(CatEstatusInvestigacion::class,'id','estatus_investigacion_id');
	// }

	// public function DomicilioDelito()
	// {
	// 	return $this->hasOne(DomicilioDelito::class,'carpeta_investigacion_id','id');
	// }
}