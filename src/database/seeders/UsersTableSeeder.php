<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $manager =
            [
                'full_name' => 'Manager',
                'email'     => 'manager@gmail.com',
                'role'      => 'manager',
                'birthday'  => '2021-02-21',
                'password'  => bcrypt('123456')
            ];
        $director =
            [
                'full_name' => 'CEO',
                'email'     => 'director@gmail.com',
                'role'      => 'director',
                'birthday'  => '2021-02-21',
                'password'  => bcrypt('123456')
            ];
        \App\Models\User::create($manager);
        \App\Models\User::create($director);
        \App\Models\User::factory(1700)->create();
    }
}
