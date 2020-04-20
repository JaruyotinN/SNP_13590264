<?php

use Illuminate\Database\Seeder;

class Internstatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('internstatuses')->insert([
            [
                'title'=>'ยังไม่มีสถานที่ฝึกงาน'
            ],
            [
                'title'=>'ยืนยันสถานที่ฝึกงาน'
            ],
            [
                'title'=>'มีสถานที่ฝึกงาน'
            ],
            [
                'title'=>'รอการฝึกงาน'
            ],
            [
                'title'=>'กำลังฝึกงาน'
            ],
            [
                'title'=>'กำลังฝึกงาน(ประเมินครั้งที่ 1)'
            ],
            [
                'title'=>'กำลังฝึกงาน(ประเมินครั้งที่ 2)'
            ],
            [
                'title'=>'สิ้นสุดฝึกงาน'
            ],
        ]);
    }
}
