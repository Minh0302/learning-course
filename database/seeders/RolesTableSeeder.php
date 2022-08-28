<?php

namespace Database\Seeders;
use App\Models\Roles;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();
        Roles::create(['roles_name' => 'admin']);
        Roles::create(['roles_name' => 'author']);
    }
}
