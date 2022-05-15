<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CuentapropiaFactory extends Factory
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
            'nombre' => $this->faker->words(3, true),
            'estado' => true,
            'saldo' => $this->faker->randomFloat(2, 6000000, 20000000),
            
        ];
    }
}
