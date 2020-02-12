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
                'name'=>'Kowit',
                'surname'=>'Meeboon',
                'img'=>'',
                'email'=>'Meeboon_k@silpakorn.edu',
                'uni_id'=>1,
                'faculty_id'=>1,
                'major_id'=>1,
                'profile_id'=>2,
            ],
            [
                'name'=>'Sarayut',
                'surname'=>'Thibhodee',
                'img'=>'',
                'email'=>'Thibhodee_s@silpakorn.edu',
                'uni_id'=>1,
                'faculty_id'=>1,
                'major_id'=>1,
                'profile_id'=>NULL,
            ]
        ]);
    }
}
