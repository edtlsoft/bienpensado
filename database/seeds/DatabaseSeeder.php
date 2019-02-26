<?php

use Illuminate\Database\Seeder;
use App\Bodega;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Bodega::create(
            ['id' => 1, 'nombre' => 'Centro']
        );

        Bodega::create(
            ['id' => 2, 'nombre' => 'Oriente']
        );

        Bodega::create(
            ['id' => 3, 'nombre' => 'Occidente']
        );

        Bodega::create(
            ['id' => 4, 'nombre' => 'Sur']
        );
    }
}
