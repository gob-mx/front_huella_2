<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeniaParticular extends Model
{
	protected $table = "senia_particular";

	protected $fillable = [
		'senia_particular',
		'activo'
	];
}