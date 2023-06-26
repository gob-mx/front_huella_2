<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nacionalidad extends Model
{
	protected $table = "nacionalidad";

	protected $fillable = [
		'nacionalidad',
		'activo'
	];
}