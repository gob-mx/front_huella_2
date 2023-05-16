<?php

namespace App\Models\RegistroImplicados;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Administracion\ModulsPermissions;
// use Spatie\Permission\Models\Permission;

class CarpetaInvestigacion extends Model
{
	protected $table = "carpeta_investigacion";
	// protected $primaryKey = 'admin_id';

	protected $fillable = [
		'carpeta_investigacion',
		'averiguacion_previa',
		'delito',
		'descripcion_delito',
		'total_implicados',
		'observaciones',
		'fecha_hechos',
		'fecha_registro',
		'estatus_investigacion_id',
	];

	// public function CatEstatusInvestigacion()
	// {
	//     return $this->belongsTo(Permission::class,'cat_estatus_investigacion','id');
	// }
}