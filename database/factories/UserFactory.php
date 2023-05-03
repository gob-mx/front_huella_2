<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'            => $this->faker->firstName,
            'apellido_paterno'  => $this->faker->lastName,
            'apellido_materno'  => $this->faker->lastName,
            'usuario'           => $this->faker->lastName,
            'rfc'               => strtoupper(Str::random(12)),
            'curp'              => strtoupper(Str::random(18)),

            // 'first_name'        => $this->faker->firstName,
            // 'last_name'         => $this->faker->lastName,
            'email'             => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ];
    }
}
