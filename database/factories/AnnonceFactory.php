<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonce>
 */
class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $a = ["1706978716.png","1706978880.webp","1706979213.webp","1706979339.webp"];
        return [
            'title' => fake()->name(),
            'description' => fake()->text(100),
            'entreprise_id' => fake()->numberBetween(1,10),
            "image" =>  $a[random_int(0,3)]
        ];
    }
}
