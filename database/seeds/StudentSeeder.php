<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_infos')->insert([
            [   
                'name'=>'Sname',
                'surname'=>'Ssurname',
                'number'=>'13590264',
                'address'=>'123 home',
                'district_id'=>'Admin',
                'province_id'=>'Admin',
                'port'=>'none',
                'cv'=>'none',
                'url_port'=>'none',
                'sendinvite'=>1,
                'intern_id'=> 1,
                'major_id'=> 1,
                'teacher_id'=> 1,
                'profile_id'=>1,
            ]
        ]);
    }
}
