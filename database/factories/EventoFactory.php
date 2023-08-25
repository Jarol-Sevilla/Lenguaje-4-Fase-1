<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\evento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    protected $model = evento::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=>$this->faker->words(3, true),
            'descripcion'=>$this->faker->sentence(5,true),
            'fecha_inicio'=>$this->faker->dateTime(),
            'fecha_cierre'=>$this->faker->dateTime(),
            'contacto_id'=>$this->faker->usignedBigInteger(1, 400)
        ];
    }
}
