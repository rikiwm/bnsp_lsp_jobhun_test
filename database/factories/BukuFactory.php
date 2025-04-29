<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'judul' => fake()->catchPhrase(),
                'penulis' =>fake()->name(),
                'penerbit' => fake()->company(),
                'tahun_terbit' => fake()->year('+10 years'),
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now(),
        ];
    }
}
