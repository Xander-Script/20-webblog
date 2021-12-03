<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Makeable\LaravelFactory\Factory;

class ArticleFactory extends Factory
{
    public $model = Article::class;

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
            'description' => $this->faker->paragraph(6, true),
            'user_id' => $this->faker->boolean(50) ? \App\Models\User::pluck('id')->random() : 1,
            'created_at' => $this->faker->dateTime(),
            'premium' => $this->faker->boolean(),
            'published_at' => $this->faker->boolean(75) ? $this->faker->dateTime() : null,
        ];
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
