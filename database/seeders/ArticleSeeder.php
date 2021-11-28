<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        Collection::times(rand(20, 100))->map(function () use ($categories) {
            factory(Article::class)
                    ->hasAttached($categories->random(random_int(0, 5)))
                    ->create();
        });
    }
}
