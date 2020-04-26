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
                'name'=>'สรุสีห์',
                'surname'=>'เจาะจง',
                'number'=>'13590293',
                'phonenumber'=>'0971485555',
                'grade' => 3.10,
                'address'=>'123 home',
                'img'=>'/uploads/images/comevents/DSCF9726.JPG',
                'url_port'=>'none',
                'sendinvite'=>5,
                'intern_id'=> 1,
                'major_id'=> 1,
                'faculty_id'=> 1,
                'teacher_id'=> 1,
                'profile_id'=>1,
            ],
            [   
                'name'=>'ณัทกฤช',
                'surname'=>'จารุโยธิน',
                'number'=>'13590264',
                'phonenumber'=>'0971482449',
                'address'=>'717 ถนนเพชรเกษม ซอยเพชรเกษม 4 ท่าพระ บางกอกใหญ่ กรุงเทพ 10600',
                'img'=>'/uploads/images/comevents/profile.JPG',
                'url_port'=>'www.behance.com',
                'grade' => 3.02,
                'sendinvite'=>5,
                'intern_id'=> 1,
                'faculty_id'=> 1,
                'major_id'=> 1,
                'teacher_id'=> 1,
                'profile_id'=>4,
            ],
            [   
                'name'=>'สิทธิชัย',
                'surname'=>'อยู่ถาวร',
                'number'=>'13590271',
                'phonenumber'=>'097892449',
                'address'=>'xx ถนนxxx ซอยxxx xxx xxx xxxx 10900',
                'img'=>'/uploads/images/comevents/DSCF9731.jpeg',
                'url_port'=>'www.behance.com',
                'grade' => 3.15,
                'sendinvite'=>5,
                'intern_id'=> 1,
                'faculty_id'=> 1,
                'major_id'=> 1,
                'teacher_id'=> 1,
                'profile_id'=>5,
            ],
            [   
                'name'=>'ณัฐพล',
                'surname'=>'ปัญญาดี',
                'number'=>'13590260',
                'phonenumber'=>'0911486549',
                'address'=>'xx ถนนxxx ซอยxxx xxx xxx xxxx 10900',
                'img'=>'/uploads/images/comevents/DSCF9683.JPG',
                'url_port'=>'www.behance.com',
                'grade' => 3.17,
                'sendinvite'=>5,
                'intern_id'=> 1,
                'faculty_id'=> 1,
                'major_id'=> 1,
                'teacher_id'=> 1,
                'profile_id'=>6,
            ],
        ]);
    }
}
