<?php

use Illuminate\Database\Seeder;
use App\User;
use Bican\Roles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = "admin@gmail.com";
        $user->name = "Udaiyar";
        $user->password = bcrypt('qwerty');
        $user->save();

        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin'
        ]);

        $userAdminRole = Role::create([
            'name' => 'UserAdmin',
            'slug' => 'user-admin',
        ]);

        $dsaRole = Role::create([
            'name' => 'User',
            'slug' => 'user',
        ]);

        
        $user->attachRole($adminRole);

    }
}
