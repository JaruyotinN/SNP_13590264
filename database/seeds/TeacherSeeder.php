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
                'email'=>'Meeboon_k@silpakorn.edu',
                'uni_id'=>1,
                'img' => '/uploads/images/updateteacher/1590211316_ajk.jpg',
                'phonenumber'=>'0987654321',
                'faculty_id'=>1,
                'major_id'=>1,
                'profile_id'=>2,
            ],

        ]);
    }
}
