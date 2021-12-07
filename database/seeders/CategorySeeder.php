<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
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
        try {
            Category::factory(20)->create();
        } catch (QueryException $e) {
            // pass.
        }
    }
}
