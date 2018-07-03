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
        $role_user = App\Role::where('name','User')->first();
        $role_author = App\Role::where('name','Author')->first();
        $role_admin = App\Role::where('name','Admin')->first();

        $user = new User();
        $user->name = 'SYSTEM';
        $user->email = 'system@clairexpress.com';
        $user->password = bcrypt('SYSTEM');
        $user->save();
        $user->roles()->attach($role_admin);

    }
}
