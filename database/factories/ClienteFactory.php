<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 *  Class ClienteFactory
 * @package App\databases\factories
 * @extends Factory<Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telephone' => $this->gerarTelefoneValido(),
            'zip_code' => $this->faker->numerify('########'),
            'address' => $this->faker->streetAddress(),
        ];
    }

    /**
     * Gera um número de telefone válido com o tamanho especificado.
     *
     * @return string
     */
    private function gerarTelefoneValido(): string
    {
        return str_pad(
            $this->faker->numberBetween(
                0,
                str_repeat(
                    '9',
                    9
                )
            ),
            9,
            '0',
            STR_PAD_LEFT
        );
    }
}
