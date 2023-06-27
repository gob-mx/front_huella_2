<?php

namespace App\Models\Expediente;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domicilio extends Model
{
	protected $table = "domicilio";

	protected $fillable = [
		'calle',
		'numero_exterior',
		'numero_interior',
		'colonia',
		'delegacion_municipio',
		'codigo_postal',
		'ciudad',
		'pais'
	];
}