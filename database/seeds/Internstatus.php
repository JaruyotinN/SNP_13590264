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
                'title'=>'สิ้นสุดฝึกงาน'
            ],
        ]);
    }
}
