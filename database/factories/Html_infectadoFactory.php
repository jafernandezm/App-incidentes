<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Html_infectado>
 */
class Html_infectadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Html_infectado::class;
    public function definition()
    {
        return [
            'html_infectado' => $this->faker->text,
            'descripcion' => $this->faker->text,
        ];
    }
}
