<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\nota;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    protected $model = nota::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'texto'=>$this->faker->sentence(12),
            'fecha'=>$this->faker->dateTime(),
            'contacto_id'=>$this->faker->numberBetween(1, 400)
        ];
    }
}
