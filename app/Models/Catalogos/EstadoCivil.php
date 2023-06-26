<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoCivil extends Model
{
	protected $table = "estado_civil";

	protected $fillable = [
		'estado_civil',
		'activo'
	];
}