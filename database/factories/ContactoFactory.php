<?php

namespace Database\Factories;

use App\Models\contacto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto>
 */
class ContactoFactory extends Factory
{
    protected $model = contacto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->firstName(),
            'apellido'=>$this->faker->lastName(),
            'correo_electronico'=>$this->faker->safeEmail,
            'telefono'=>$this->faker->numerify('########')
        ];
    }
}
