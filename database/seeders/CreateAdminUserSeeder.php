<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUser = User::create([
            'nombre'            => 'SUPERADMIN',
            'apellido_paterno'  => 'SISTEMAS',
            // 'apellido_materno'  => 'CDA',
            'usuario'           => 'sadmin',
            // 'rfc'               => 'SAF000000CDA',
            // 'curp'              => 'SCDA000000CDMXSODA',

            'email'             => 'sadmin',
            'password'          => Hash::make('sadmin!!!'),
            'email_verified_at' => now(),
            'api_token'         => Hash::make('sadmin!!!'),
        ]);

        $role = Role::create(['name' => 'SADMIN']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $demoUser->assignRole([$role->id]);

        $this->addDummyInfo($faker, $demoUser);



        $demoUser2 = User::create([
            'nombre'            => 'ADMINISTRADOR',
            'apellido_paterno'  => 'ADMIN',
            // 'apellido_materno'  => 'CDA',
            'usuario'           => 'admin',
            // 'rfc'               => 'SAF000000SAF',
            // 'curp'              => 'ACDA000000CDMXSODA',

            'email'             => 'admin',
            'password'          => Hash::make('admin'),
            'email_verified_at' => now(),
            'api_token'         => Hash::make('admin'),
        ]);

        $role = Role::create(['name' => 'ADMINISTRADOR']);
   
        $role->syncPermissions([
            'listar_usuarios',
            'crear_usuarios',
            'ver_usuarios',
            'editar_usuarios',
            'listar_roles',
            // 'crear_roles',
            'ver_roles',
            // 'editar_roles',
            'listar_permisos',
            // 'crear_permisos',
            'ver_permisos',
            // 'editar_permisos',
            // 'crear_modulo_permisos',
            // 'editar_modulo_permisos',
        ]);
     
        $demoUser2->assignRole([$role->id]);

        $this->addDummyInfo($faker, $demoUser2);



        // User::factory(5)->create()->each(function (User $user) use ($faker) {
        //     $this->addDummyInfo($faker, $user);

        //     $permissions = Permission::pluck('id','id')->all();
        //     $role = new Role();
        //     $role->syncPermissions($permissions);
        //     $user->assignRole([2]);
        // });
    }

    private function addDummyInfo(Generator $faker, User $user)
    {
        $dummyInfo = [
            // 'company'   => $faker->company,
            // 'phone'     => $faker->phoneNumber,
            // 'website'   => $faker->url,
            // 'language'  => $faker->languageCode,
            // 'country'   => $faker->countryCode,

            // 'telefono'     => $faker->phoneNumber,
        ];

        $info = new UserInfo();
        foreach ($dummyInfo as $key => $value) {
            $info->$key = $value;
        }
        $info->user()->associate($user);
        $info->save();
    }
}
