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
        $user->name = 'Snak';
        $user->email = 'snake@user.com';
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($role_user);

        $author = new User();
        $author->name = 'Bright';
        $author->email = 'bright@author.com';
        $author->password = bcrypt('author');
        $author->save();
        $author->roles()->attach($role_author);

        $admin = new User();
        $admin->name = 'Evile';
        $admin->email = 'Evile@admin.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
