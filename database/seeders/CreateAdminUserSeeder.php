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
            'apellido_paterno'  => 'SODACDA',
            'apellido_materno'  => 'CDA',
            'usuario'           => 'sadmin',
            'rfc'               => 'SAF000000CDA',
            'curp'              => 'SCDA000000CDMXSODA',

            'first_name'        => $faker->firstName,
            'last_name'         => $faker->lastName,
            'email'             => 'demo@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'api_token'         => Hash::make('demo@demo'),
        ]);

        $role = Role::create(['name' => 'ADMIN']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $demoUser->assignRole([$role->id]);

        $this->addDummyInfo($faker, $demoUser);



        $demoUser2 = User::create([
            'nombre'            => 'ADMIN',
            'apellido_paterno'  => 'ADMIN',
            'apellido_materno'  => 'CDA',
            'usuario'           => 'admin',
            'rfc'               => 'SAF000000SAF',
            'curp'              => 'ACDA000000CDMXSODA',

            'first_name'        => $faker->firstName,
            'last_name'         => $faker->lastName,
            'email'             => 'admin@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'api_token'         => Hash::make('admin@demo'),
        ]);

        $role = Role::create(['name' => 'REGISTROS AUDITORÍA']);
   
        $role->syncPermissions([
            'listar_reg_aud',
            'crear_reg_aud',
            'editar_reg_aud',
            'reporte_reg_aud'
        ]);
     
        $demoUser2->assignRole([$role->id]);

        $this->addDummyInfo($faker, $demoUser2);



        User::factory(5)->create()->each(function (User $user) use ($faker) {
            $this->addDummyInfo($faker, $user);

            $permissions = Permission::pluck('id','id')->all();
            $role = new Role();
            $role->syncPermissions($permissions);
            $user->assignRole([2]);
        });
    }

    private function addDummyInfo(Generator $faker, User $user)
    {
        $dummyInfo = [
            'company'   => $faker->company,
            'phone'     => $faker->phoneNumber,
            'website'   => $faker->url,
            'language'  => $faker->languageCode,
            'country'   => $faker->countryCode,

            'telefono'     => $faker->phoneNumber,

            // 'apellido1' => $faker->lastName,
            // 'apellido2' => $faker->lastName,
            // 'rfc'       => strtoupper(Str::random(12)),
            // 'curp'      => strtoupper(Str::random(18)),
        ];

        $info = new UserInfo();
        foreach ($dummyInfo as $key => $value) {
            $info->$key = $value;
        }
        $info->user()->associate($user);
        $info->save();
    }
}
