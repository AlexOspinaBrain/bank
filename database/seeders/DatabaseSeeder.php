<?php

namespace Database\Seeders;

use App\Models\Cuentapropia;
use App\Models\Cuentatercero;
use App\Models\Transaccion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        Cuentapropia::factory(5)->create();
        Cuentatercero::factory(3)->create();
        Transaccion::factory(10)->create();
    }
}
