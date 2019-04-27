<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $autherRole = Role::where('name', 'auther')->first();
        $userRole = Role::where('name', 'user')->first();
        
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456),
        ]);
        $auther = User::create([
            'name' => 'Auther',
            'email' => 'auther@gmail.com',
            'password' => bcrypt(123456),
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt(123456),
        ]);
        
        $admin->roles()->attach($adminRole);
        $auther->roles()->attach($autherRole);
        $user->roles()->attach($userRole);

        factory(User::class, 50)->create();
    }
}
