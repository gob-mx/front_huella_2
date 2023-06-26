<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SituacionPersona extends Model
{
	protected $table = "situacion_persona";

	protected $fillable = [
		'situacion_persona',
		'activo'
	];
}