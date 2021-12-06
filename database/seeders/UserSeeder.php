<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['root', 'editor', 'author', 'premium member', 'member'] as $role) {
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
        \App\Models\User::factory(10)->create();
    }
}
