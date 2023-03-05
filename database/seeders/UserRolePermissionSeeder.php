<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'level' => 'admin',
        ];

        DB::beginTransaction();

        try {
            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'Admin',
            ], $default_user_value));

            $user = User::create(array_merge([
                'email' => 'user@gmail.com',
                'name' => 'User',
            ], $default_user_value));

            $role_admin = Role::create(['name' => 'admin']);
            $role_user = Role::create(['name' => 'user']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);

            $role_admin->givePermissionTo('read role', 'create role', 'update role', 'delete role');

            $admin->assignRole('admin');
            $user->assignRole('user');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
