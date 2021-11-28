<?php

namespace Database\Factories;

use App\Models\Category;
use Carbon\Carbon;
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
            'user_id' => $this->faker->boolean(50) ? \App\Models\User::pluck('id')->random() : 1,
            'draft' => $this->faker->boolean(33),
            'category_id' => $this->faker->boolean(90) ? Category::pluck('id')->random() : 1,
            'created_at' => $this->faker->dateTime(),
            'premium' => $this->faker->boolean(),
        ];
    }

    public function category(int $id = 1)
    {
        return $this->state(function (array $attributes) use ($id) {
            return ['category_id' => $id];
        });
    }

    public function user_id(int $id = 1)
    {
        return $this->state(function (array $attributes) use ($id) {
            return ['user_id' => $id];
        });
    }

    public function premium(bool $premium = true)
    {
        return $this->state(function (array $attributes) use ($premium) {
            return ['premium' => $premium];
        });
    }
}
