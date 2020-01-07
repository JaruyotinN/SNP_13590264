<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Student',
                'email'=>'student@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 1
            ],
            [
                'name'=>'Teacher',
                'email'=>'teacher@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 2
            ],
            [
                'name'=>'Company',
                'email'=>'company@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 3
            ],
        ]);
    }
}
