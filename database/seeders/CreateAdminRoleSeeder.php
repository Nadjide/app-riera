<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class CreateAdminRoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // des permissions admin
        $adminRole->syncPermissions([
            'create-event',
            'edit-event',
            'delete-event',
        ]);
    }
}
