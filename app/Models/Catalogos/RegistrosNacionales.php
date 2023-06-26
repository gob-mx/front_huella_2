<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistrosNacionales extends Model
{
	protected $table = "registros_nacionales";

	protected $fillable = [
		'registros_nacionales',
		'activo'
	];
}