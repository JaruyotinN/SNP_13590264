<?php

use Illuminate\Database\Seeder;

class InternCalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intern_calendars')->insert([
            [
                'description'=>'นักศึกษาทำเรื่องขอฝึกงานผ่านคณะวิชา เพื่อทำหนังสือขอความอนุเคราะห์หน่วยงาน',
                'start_date'=>'2020-01-01',
                'end_date'=>'2020-05-06',
                'faculty_id'=>1,
                'uni_id'=>1,
                
            ],
            [
                'description'=>'กำหนดวันสุดท้ายของการตอบรับนักศึกษาเข้าฝึกงาน',
                'start_date'=>'2020-01-01',
                'end_date'=>'2020-05-20',
                'faculty_id'=>1,
                'uni_id'=>1,
                
            ],
            [
                'description'=>'ช่วงเวลาฝึกงาน โดยมีเวลาฝึกรวมไม่น้อยกว่า 320 ชั่วโมง',
                'start_date'=>'2020-05-30',
                'end_date'=>'2020-08-05',
                'faculty_id'=>1,
                'uni_id'=>1,
                
            ],
        ]);
    }
}
