<?php

namespace App\Models\Expediente;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Catalogos\EstadoCivil;
use App\Models\Catalogos\Nacionalidad;
use App\Models\Catalogos\Sexo;

use App\Models\Expediente\Domicilio;
use App\Models\Expediente\Subject;

class Persona extends Model
{
	protected $table = "persona";

	protected $fillable = [
		'expediente_biometrico_id',
		'subject_id',
		'domicilio_id',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'fecha_nacimiento',
		'sexo_id',
		'estado_civil_id',
		'curp',
		'nacionalidad_id',
		'pais_nacimiento',
		'entidad_nacimiento',
		'peso',
		'estatura',
	];

	// Relacion uno a uno
	public function Sexo(){
		return $this->hasOne(Sexo::class,'id','sexo_id');
	}

	public function EstadoCivil(){
		return $this->hasOne(EstadoCivil::class,'id','estado_civil_id');
	}

	public function Nacionalidad(){
		return $this->hasOne(Nacionalidad::class,'id','nacionalidad_id');
	}

	public function Domicilio(){
		return $this->hasOne(Domicilio::class,'id','domicilio_id');
	}

	public function Subject(){
		return $this->hasOne(Subject::class,'SubjectId','subject_id');
	}

	//Relacion uno a muchos
	// public function Huellas() {
	// 	// return $this->hasMany("App\Models\ResgistroImplicados\Huellas");
	// 	// return $this->belongsTo(Huellas::class, 'persona_id','id');
	// 	// return $this->belongsTo(Huellas::class, 'persona_id','id');
	// 	// return $this->belongsTo("App\Models\User");
	// 	// return $this->hasMany(Huellas::class, 'persona_id','id');
	// }

	//Relacion uno a muchos
	// public function Huellas() {
	// 	return $this->hasMany(Huellas::class,'persona_id','id');
	// }

	// public function EstatusInvestigacion()
	// {
	// 	return $this->hasOne(CatEstatusInvestigacion::class,'id','estatus_investigacion_id');
	// }

	// public function DomicilioDelito()
	// {
	// 	return $this->hasOne(DomicilioDelito::class,'carpeta_investigacion_id','id');
	// }
}