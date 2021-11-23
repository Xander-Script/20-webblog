<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(6, true),
            'user_id' => \App\Models\User::pluck('id')->random(),
            'draft' => $this->faker->boolean(33)
        ];
    }
}
