<?php

namespace App\Models\RegistroImplicados;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CatTipoImplicado extends Model
{
	protected $table = "cat_tipo_implicado";

	protected $fillable = [
		'tipo_implicado',
		'acronimo_tipo_impl',
	];
}