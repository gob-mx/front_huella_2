<?php

namespace App\Models\Expediente;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonaSenias extends Model
{
	protected $table = "persona_senias";

	protected $fillable = [
		'persona_id',
		'senias_id'
	];
}