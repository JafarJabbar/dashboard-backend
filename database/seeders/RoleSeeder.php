<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::query();
        $roles->truncate();

        $roles = [
            'super-admin',
            'admin',
            'manager',
        ];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

    }
}
