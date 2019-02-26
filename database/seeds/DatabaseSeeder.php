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

        Bodega::insert([
            ['id' => 1, 'nombre' => 'Centro'],
            ['id' => 2, 'nombre' => 'Oriente'],
            ['id' => 3, 'nombre' => 'Occidente'],
            ['id' => 4, 'nombre' => 'Sur'],
        ]);
    }
}
