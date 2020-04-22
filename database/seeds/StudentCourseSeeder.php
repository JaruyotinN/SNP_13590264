<?php

use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        DB::table('student_coutses')->insert([
            [
                'name'=>'หลักสูตรที่ 1',
                'description'=>'ทำงาน จันทร์ - ศุกร์ เป็นเวลาอย่างน้อย 320 ชั่วโมง',
                'start_date'=>'2020-01-01',
                'end_date'=>'2020-05-06',
                'faculty_id'=>1,
                
            ],
            [
                'name'=>'หลักสูตรที่ 2',
                'description'=>'ทำงาน จันทร์ - เสาร์ เป็นเวลาอย่างน้อย 320 ชั่วโมง',
                'start_date'=>'2020-01-01',
                'end_date'=>'2020-05-06',
                'faculty_id'=>1,
                
            ],
        ]);
    }
}
