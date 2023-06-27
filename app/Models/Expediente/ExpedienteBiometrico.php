<?php

namespace App\Models\Expediente;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Expediente\Persona;

class ExpedienteBiometrico extends Model
{
	protected $table = "expediente_biometrico";

	protected $fillable = [
		'codigo_delito',
		'tipo_registro_id',
		'tipo_policia',
		'situacion_persona_id',
		'informacion',
		'peligrosidad_id',
		'fecha_ingreso',
		'registros_nacionales_id',
		'clave_identificacion_1',
		'clave_identificacion_2',
		'clave_identificacion_3',
		'contacto_agencia',
		'comentarios'
	];

	// //Relacion uno a muchos
	// public function Persona() {
	// 	return $this->hasMany(Persona::class,'id','expediente_biometrico_id');
	// }
}