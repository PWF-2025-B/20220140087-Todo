<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // Gunakan 'title' karena sesuai struktur tabel
            'user_id' => \App\Models\User::factory(), // Karena kolom 'user_id' wajib
        ];
    }
}
