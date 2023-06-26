<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoRegistro extends Model
{
	protected $table = "tipo_registro";

	protected $fillable = [
		'tipo_registro',
		'activo'
	];
}