<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'create_user',
            'description' => 'Permission to create a new user'
        ]);
        
        Permission::create([
            'name' => 'edit_user',
            'description' => 'Permission to edit an existing user'
        ]);
        
    }
}
