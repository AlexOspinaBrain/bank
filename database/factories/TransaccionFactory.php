<?php

namespace Database\Factories;

use App\Models\Cuentapropia;
use App\Models\Cuentatercero;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'cuentapropias_sale_id' => Cuentapropia::inRandomOrder()->value('id'),
            'cuentapropias_entra_id' => Cuentapropia::inRandomOrder()->value('id'),
            'cuentaterceros_entra_id' => Cuentatercero::inRandomOrder()->value('id'),
            
            'monto' => $this->faker->randomFloat(2, 1000000, 3000000),
        ];
    }
}
