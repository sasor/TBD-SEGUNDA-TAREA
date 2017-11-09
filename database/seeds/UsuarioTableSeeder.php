<?php

use Illuminate\Database\Seeder;
use App\Usuario;
use Faker\Factory as Faker;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i<5; $i++) {
            Usuario::create(
                [
                    'username' => $faker->userName,
                    'password' => $faker->userName
                ]
            );
        }
    }
}
