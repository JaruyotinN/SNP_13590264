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
            [
                'name'=>'Jettapon',
                'email'=>'stu02@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 1
            ],
            [
                'name'=>'Sitichai',
                'email'=>'stu03@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 1
            ],
            [
                'name'=>'Nattapon',
                'email'=>'stu04@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 1
            ],
            [
                'name'=>'Uppercutz',
                'email'=>'uppercutz@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 3
            ],
            [
                'name'=>'Rabbit',
                'email'=>'rabbit@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 3
            ],
            [
                'name'=>'Grappik',
                'email'=>'grappik@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 3
            ],
            [
                'name'=>'Inspiredigi',
                'email'=>'inspiredigi@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 3
            ],
            [
                'name'=>'Kidyer',
                'email'=>'kidyer@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 3
            ],
            [
                'name'=>'bangkokweb',
                'email'=>'bangkokweb@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 3
            ],
            [
                'name'=>'miracalelife',
                'email'=>'miracalelife@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 3
            ],
            [
                'name'=>'RobertB',
                'email'=>'bosch@inlearnship.com',
                'password'=> bcrypt('123456'),
                'role'=> 3
            ],
        ]);
    }
}
