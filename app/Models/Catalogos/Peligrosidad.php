<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peligrosidad extends Model
{
	protected $table = "peligrosidad";

	protected $fillable = [
		'peligrosidad',
		'activo'
	];
}