<?php

namespace App\Models\Expediente;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Senias extends Model
{
	protected $table = "senias";

	protected $fillable = [
		'senia_particular_id',
		'nombre_archivo',
		'url'
	];
}