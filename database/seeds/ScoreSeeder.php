<?php

use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert([
            [
                'stu_id'=> 1,
                'user_id'=>1,
                'score' => 0,
                'type_id'=>27,
                
            ],
            [
                'stu_id'=> 1,
                'user_id'=>1,
                'score' => 0,
                'type_id'=>28,
                
            ],
            [
                'stu_id'=> 1,
                'user_id'=>1,
                'score' => 0,
                'type_id'=>29,
                
            ],
            [
                'stu_id'=> 1,
                'user_id'=>1,
                'score' => 0,
                'type_id'=>30,
                
            ],
            [
                'stu_id'=> 2,
                'user_id'=>4,
                'score' => 0,
                'type_id'=>27,
                
            ],
            [
                'stu_id'=> 2,
                'user_id'=>4,
                'score' => 0,
                'type_id'=>28,
                
            ],
            [
                'stu_id'=> 2,
                'user_id'=>4,
                'score' => 0,
                'type_id'=>29,
                
            ],
            [
                'stu_id'=> 2,
                'user_id'=>4,
                'score' => 0,
                'type_id'=>30,
                
            ],
            [
                'stu_id'=> 3,
                'user_id'=>5,
                'score' => 0,
                'type_id'=>27,
                
            ],
            [
                'stu_id'=> 3,
                'user_id'=>5,
                'score' => 0,
                'type_id'=>28,
                
            ],
            [
                'stu_id'=> 3,
                'user_id'=>5,
                'score' => 0,
                'type_id'=>29,
                
            ],
            [
                'stu_id'=> 3,
                'user_id'=>5,
                'score' => 0,
                'type_id'=>30,
                
            ],
            [
                'stu_id'=> 4,
                'user_id'=>6,
                'score' => 0,
                'type_id'=>27,
                
            ],
            [
                'stu_id'=> 4,
                'user_id'=>6,
                'score' => 0,
                'type_id'=>28,
                
            ],
            [
                'stu_id'=> 4,
                'user_id'=>6,
                'score' => 0,
                'type_id'=>29,
                
            ],
            [
                'stu_id'=> 4,
                'user_id'=>6,
                'score' => 0,
                'type_id'=>30,
                
            ],
           
        ]);
    }
}
