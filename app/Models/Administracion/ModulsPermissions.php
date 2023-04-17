<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Administracion\Moduls;
// use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;

class ModulsPermissions extends Model
{
    protected $table = "moduls_permissions";
    protected $primaryKey = 'modul_id';
    public $timestamps = false;

    protected $fillable = [
        'modul_id',
        'permission_id'
    ];
}
