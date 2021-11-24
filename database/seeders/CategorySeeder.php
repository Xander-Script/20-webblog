<?php

namespace Database\Seeders;

use App\Models\Category;
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
        // We need some categories before we can use the `withParentCategory` state.
        Category::factory(5)->create();
        Category::factory(25)->withParentCategory()->create();
    }
}
