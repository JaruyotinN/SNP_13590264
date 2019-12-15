<?php

use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            [
                'faculty_id'=>1,
                'name'=>'web'
            ],
            [
                'faculty_id'=>1,
                'name'=>'game'
            ]
        ]);
    }
}
