<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sexo extends Model
{
	protected $table = "sexo";

	protected $fillable = [
		'sexo',
		'activo'
	];
}