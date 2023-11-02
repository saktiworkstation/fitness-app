<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
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
            'descriptions' => collect($this->faker->paragraphs(mt_rand(1, 2))),
            'instructor' => $this->faker->name(),
        ];
    }
}
