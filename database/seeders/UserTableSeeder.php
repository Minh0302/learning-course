<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRoles = Roles::where('roles_name', 'admin')->first();
        $authorRoles = Roles::where('roles_name', 'author')->first();

        $admin = Admin::create([
            "admin_name" => "Admin",
            "admin_email" => "admin@gmail.com",
            "admin_phone" => "0971850845",
            "admin_password" => md5("123456"),
        ]);
        $author = Admin::create([
            "admin_name" => "Lê Minh",
            "admin_email" => "leminh@gmail.com",
            "admin_phone" => "0971850845",
            "admin_password" => md5("123456"),
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
    }
}
