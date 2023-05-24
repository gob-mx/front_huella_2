<?php

namespace App\Models\RegistroImplicados;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DomicilioDelito extends Model
{
	protected $table = "domicilio_delito";

	protected $fillable = [
		'pais',
		'calle',
		'numero_exterior',
		'numero_interior',
		'colonia',
		'delegacion_municipio',
		'codigo_postal',
		'carpeta_investigacion_id'
	];
}