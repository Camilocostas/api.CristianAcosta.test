<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Graduate>
 */
class GraduateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' =>$this->faker->word(),
            'apellido' =>$this->faker->word(),
            'telefono' =>$this->faker->word(),
            'correo' =>$this->faker->word(),

            'city_id' => \App\Models\City::factory()
        ];
    }
}
