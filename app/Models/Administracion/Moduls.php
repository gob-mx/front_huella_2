<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Administracion\ModulsPermissions;
use Spatie\Permission\Models\Permission;

class Moduls extends Model
{
	protected $table = "moduls";
	// protected $primaryKey = 'admin_id';

    protected $fillable = [
		'name',
		'acronym',
		'active'
    ];

    public function Permissions()
    {
        return $this->belongsToMany(Permission::class,'moduls_permissions','modul_id','permission_id');
    }
}