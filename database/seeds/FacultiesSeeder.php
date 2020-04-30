<?php

use Illuminate\Database\Seeder;

class FacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->insert([
            [
                'name'=>'คณะเทคโนโลยีสารสนเทศและการสื่อสาร',
                'uni_id'=>1,
            ],
            [
                'name'=>'คณะจิตรกรรมประติมากรรมและภาพพิมพ์',
                'uni_id'=>1,
            ],
            [
                'name'=>'คณะสถาปัตยกรรมศาสตร์',
                'uni_id'=>1,
            ],
            [
                'name'=>'คณะโบราณคดี',
                'uni_id'=>1,
            ],
            [
                'name'=>'คณะมัณฑนศิลป์',
                'uni_id'=>1,
            ],
            [
                'name'=>'คณะอักษรศาสตร์',
                'uni_id'=>1,
            ],
            [
                'name'=>'คณะวิทยาศาสตร์',
                'uni_id'=>1,
            ],

            [
                'name'=>'คณะเภสัชศาสตร์',
                'uni_id'=>1,
            ],
            [
                'name'=>'คณะวิศวกรรมศาสตร์และเทคโนโลยีอุตสาหกรรม',
                'uni_id'=>1,
            ],
            [
                'name'=>'คณะสัตวศาสตร์และเทคโนโลยีการเกษตร',
                'uni_id'=>1,
            ],
            [
                'name'=>'คณะวิทยาการจัดการ',
                'uni_id'=>1,
            ],
            [
                'name'=>'วิทยาลัยนานาชาติ',
                'uni_id'=>1,
            ],
            [
                'name'=>'บัณฑิตวิทยาลัย',
                'uni_id'=>1,
            ],
        ]);
    }
}
