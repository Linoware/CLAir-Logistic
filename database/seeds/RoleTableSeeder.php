<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        DB::table('user_role')->truncate();
//        DB::table('users')->truncate();
//        // DB::table('roles')->truncate();

         $role_user = new Role();
         $role_user->name = 'User';
         $role_user->guard_name = 'A Normal User';
         $role_user->save();

         $role_author = new Role();
         $role_author->name = 'Author';
         $role_author->guard_name = 'An Author';
         $role_author->save();

         $role_admin = new Role();
         $role_admin->name = 'Admin';
         $role_admin->guard_name = 'An Admin';
         $role_admin->save();


    }
}
