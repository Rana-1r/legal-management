<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['موظف قانوني', 'مدير الإدارة القانونية', 'موظف إدارة داخلية', 'الإدارة العليا', 'الادمن'];

        foreach ($roles as $role) {
            Role::updateOrCreate(['role_name' => $role]);
    }
}
}