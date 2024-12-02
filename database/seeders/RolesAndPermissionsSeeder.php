<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'access user dashboard']);
        Permission::create(['name' => 'create community quizzes']);
        Permission::create(['name' => 'modify community quizzes']);
        Permission::create(['name' => 'delete community quizzes']);
        Permission::create(['name' => 'access contributor dashboard']);
        Permission::create(['name' => 'modify official quizzes']);
        Permission::create(['name' => 'modify official courses']);
        Permission::create(['name' => 'access admin dashboard']);
        Permission::create(['name' => 'create official quizzes']);
        Permission::create(['name' => 'create official courses']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'modify users']);

        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
        // this can be done as separate statements
        $role = Role::create(['name' => UserRole::Administrator]);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => UserRole::Contributor]);
        $role->givePermissionTo(['access contributor dashboard', 'modify official quizzes', 'modify official courses']);

        $role = Role::create(['name' => UserRole::User]);
        $role->givePermissionTo(['access user dashboard', 'create community quizzes', 'modify community quizzes', 'delete community quizzes']);
    }
}
