<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(1)->fill(['name' => 'Uncategorized', 'id' => 1])->create();
        Category::factory(20)->create();
    }
}
