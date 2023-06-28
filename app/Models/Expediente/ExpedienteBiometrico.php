<?php

namespace App\Models\Expediente;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Catalogos\TipoRegistro;
use App\Models\Catalogos\SituacionPersona;
use App\Models\Catalogos\Peligrosidad;
use App\Models\Catalogos\RegistrosNacionales;
use App\Models\Expediente\Persona;

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

	//Relacion uno a uno
	public function Persona() {
		return $this->belongsTo(Persona::class,'id','expediente_biometrico_id');
	}

	public function TipoRegistro(){
		return $this->hasOne(TipoRegistro::class,'id','tipo_registro_id');
	}

	public function SituacionPersona(){
		return $this->hasOne(SituacionPersona::class,'id','situacion_persona_id');
	}

	public function Peligrosidad(){
		return $this->hasOne(Peligrosidad::class,'id','peligrosidad_id');
	}

	public function RegistrosNacionales(){
		return $this->hasOne(RegistrosNacionales::class,'id','registros_nacionales_id');
	}

	//Relacion uno a muchos
	// public function Persona() {
	// 	return $this->hasMany(Persona::class,'id','expediente_biometrico_id');
	// }
}