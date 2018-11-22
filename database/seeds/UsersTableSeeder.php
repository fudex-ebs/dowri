<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = [
            [
                'id' => 1,
                'name' => 'admin',
                'mobile_number' => '0540222222',
                'email' => 'admin@dowri.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ],[
                'id' => 2,
                'name' => 'customer',
                'mobile_number' => '0540222223',
                'email' => 'customer@dowri.com',
                'password' => Hash::make('123456'),
                'role' => 'customer',
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ]
        ];
        DB::table('users')->insert($users); 
    }
}
