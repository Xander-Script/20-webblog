<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RbacSeeder extends Seeder
{
    public function crud(array $array): array
    {
        return array_merge(['create', 'read', 'update', 'delete'], $array);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Generic permissions
        foreach (['login', 'logout', 'register'] as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Article permissions
        foreach ($this->crud(['view free', 'view premium', 'publish', 'undo publish']) as $permission) {
            Permission::create(['name' => "$permission articles"]);
        }

        // Guest role
        $guest = Role::create(['name' => 'guest'])
                ->givePermissionTo('view free articles', 'login', 'register');

        // Member role.
        $member = Role::create(['name' => 'member']);

        // Premium member role.
        $premium = Role::create(['name' => 'premium member']);

        // Author role.
        $author = Role::create(['name' => 'author'])
                // Article permissions
                ->givePermissionTo(['create articles', 'read articles', 'update articles']);

        // Editor role.
        $editor = Role::create(['name' => 'editor']);

        // Super user role
        $root = Role::create(['name' => 'root'])
                ->givePermissionTo(Permission::all());

    }
}
