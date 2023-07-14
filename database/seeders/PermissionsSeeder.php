<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions=Permission::query();
        $permissions->truncate();
        $contents=[
            'users',
            'news',
            'pages',
            'page_blocks',
            'events',
            'events',
            'roles',
            'access-logs',
            'action-logs',
        ];
        $actions=[
            'list',
            'add',
            'show',
            'edit',
            'delete',
            'action',
        ];
        foreach ($contents as $content) {
            foreach ($actions as $action) {
                $permission=Permission::create([
                    'name' => "{$action}.{$content}",
                ]);
                DB::table('role_has_permissions')
                    ->insert([
                        'role_id'=>1,
                        'permission_id'=>$permission->id,
                    ]);
            }
        }
    }
}
