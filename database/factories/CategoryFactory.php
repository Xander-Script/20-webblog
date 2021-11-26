<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use InvalidArgumentException;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description' => ($this->faker->boolean(75) ? $this->faker->paragraphs(rand(0, 2), true) : null),
        ];
    }

    public function withParentCategory()
    {
        return $this->state(function (array $attributes) {
            if ($this->faker->boolean()) {
                try {
                    $result = Category::pluck('id')->random();
                } catch (InvalidArgumentException $e) {
                }
            }

            return [
                'categories_id' => (isset($result) ? $result : null),
            ];
        });
    }
}
