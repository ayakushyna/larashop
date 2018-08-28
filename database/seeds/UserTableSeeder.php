<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','admin')->first();
        $role_manager  = Role::where('name', 'manager')->first();
        $role_storekeeper = Role::where('name', 'storekeeper')->first();

        $admin = new User();
        $admin->name = 'Admin Name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $manager = new User();
        $manager->name = 'Manager Name';
        $manager->email = 'manager@example.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($role_manager);

        $storekeeper = new User();
        $storekeeper->name = 'Storekeeper Name';
        $storekeeper->email = 'storekeeper@example.com';
        $storekeeper->password = bcrypt('secret');
        $storekeeper->save();
        $storekeeper->roles()->attach($role_storekeeper);
    }
}
