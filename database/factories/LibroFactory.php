<?php

namespace Database\Factories;

use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    protected $model = Libro::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'autor' => $this->faker->name,
            'estatus' => 'disponible',
            'ISBN' => $this->faker->isbn13,
            'editorial' => $this->faker->company,
            'fechaPublicacion' => $this->faker->date(),
        ];
    }

    public function hasGeneros($count)
    {
        return $this->afterCreating(function (Libro $libro) use ($count) {
            $generos = Genero::factory()->count($count)->create();
            $libro->generos()->attach($generos);
        });
    }
}
