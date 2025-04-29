<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengguna>
 */
class PenggunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama' => fake()->name(),
            'jenis_pengguna' => fake()->randomElement(['siswa', 'dosen']),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->phoneNumber(),
            
        ];
    }
}
