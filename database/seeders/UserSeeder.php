<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['root', 'editor', 'author', 'premium member', 'member'];

        foreach ($roles as $role) {
            $user = User::create([
                'name' => ucfirst($role).' User',
                'email' => str_replace(' ', '-', $role).'@example.org',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => null,
            ]);

            $user->assignRole($role);
            $user->save();
        }

        Collection::times(rand(5, 100))->map(function () use ($roles) {
            $user = factory(User::class)->make();
            $user->assignRole($roles[rand(0, count($roles) - 1)]);
            $user->save();
        });

//        \App\Models\User::factory(10)->create();
    }
}
