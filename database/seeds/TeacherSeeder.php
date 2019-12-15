<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacherinfos')->insert([
            [
                'name'=>'Tname',
                'surname'=>'Tsurname',
                'uni_id'=>1,
                'faculty_id'=>1,
                'major_id'=>1,
            ]
        ]);
    }
}
