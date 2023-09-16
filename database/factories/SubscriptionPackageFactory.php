<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'descriptions' => collect($this->faker->paragraphs(mt_rand(1, 2)))->map(fn ($p) => "<p>$p</p>")->implode(''),
            'price' => $this->faker->randomFloat(4, 25),
            'free_sessions' => $this->faker->randomFloat(10, 100),
        ];
    }
}
