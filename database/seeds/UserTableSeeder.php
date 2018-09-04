<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','User')->first();
        $role_author = Role::where('name','Author')->first();
        $role_admin = Role::where('name','Admin')->first();

        $user = new User();
        $user->name = 'SYSTEM';
        $user->email = 'system@clairexpress.com';
        $user->password = bcrypt('SYSTEM');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'SYSTEM1';
        $user->email = 'system1@clairexpress.com';
        $user->password = bcrypt('SYSTEM');
        $user->save();
        $user->roles()->attach($role_author);

        $user = new User();
        $user->name = 'SYSTEM2';
        $user->email = 'system2@clairexpress.com';
        $user->password = bcrypt('SYSTEM');
        $user->save();
        $user->roles()->attach($role_admin);

    }
}
