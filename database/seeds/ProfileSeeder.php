<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'user_id'=>1,
                'profile_type'=>'S',
            ],
            [
                'user_id'=>2,
                'profile_type'=>'T',
            ],
            [
                'user_id'=>3,
                'profile_type'=>'C',
            ],
            [
                'user_id'=>4,
                'profile_type'=>'S',
            ],
            [
                'user_id'=>5,
                'profile_type'=>'S',
            ],
            [
                'user_id'=>6,
                'profile_type'=>'S',
            ],
            [
                'user_id'=>7,
                'profile_type'=>'C',
            ],
            [
                'user_id'=>8,
                'profile_type'=>'C',
            ],
            [
                'user_id'=>9,
                'profile_type'=>'C',
            ],
            [
                'user_id'=>10,
                'profile_type'=>'C',
            ],
            [
                'user_id'=>11,
                'profile_type'=>'C',
            ],
            [
                'user_id'=>12,
                'profile_type'=>'C',
            ],
            [
                'user_id'=>13,
                'profile_type'=>'C',
            ],
            [
                'user_id'=>14,
                'profile_type'=>'C',
            ],
            
            
        ]);
    }
}
