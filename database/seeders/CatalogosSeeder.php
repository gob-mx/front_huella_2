<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegistroImplicados\CatEstatusInvestigacion;
use App\Models\RegistroImplicados\CatTipoImplicado;

class CatalogosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatEstatusInvestigacion::create([ 'Estatus_carpeta' => 'APERTURA', 'activo' => 1 ]);
        CatEstatusInvestigacion::create([ 'Estatus_carpeta' => 'EN PROCESO', 'activo' => 1 ]);
        CatEstatusInvestigacion::create([ 'Estatus_carpeta' => 'CONCLUIDA', 'activo' => 1 ]);

        CatTipoImplicado::create([ 'tipo_implicado' => 'IMPLICADO', 'acronimo_tipo_impl' => 'IMPL' ]);
        CatTipoImplicado::create([ 'tipo_implicado' => 'RELACIONADO', 'acronimo_tipo_impl' => 'REL' ]);
        CatTipoImplicado::create([ 'tipo_implicado' => 'OFICIAL', 'acronimo_tipo_impl' => 'IFC' ]);
    }
}
