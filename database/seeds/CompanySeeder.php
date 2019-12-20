<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('companyinfos')->insert([
            [
                'name'=>'ไลค์มี จำกัด',
                'address'=>'126/5 อาคาร ไทยศรี ชั้น2 ถนนกรุงธนบุรี แขวงบางลำภูล่าง เขตคลองสาน กรุงเทพมหานคร 10600',
                'logo'=>'',
                'district_id'=>1,
                'province_id'=>1,
                'prove'=>"none",
                'juristic'=>"none",
            ],
            [
                'name'=>'อัปเปอร์คัซ ครีเอทีฟ จำกัด',
                'address'=>'101/24, ท่าแร้ง, บางเขน, กรุงเทพมหานคร 10220',
                'logo'=>'',
                'district_id'=>1,
                'province_id'=>1,
                'prove'=>"none",
                'juristic'=>"none",
            ],
           
            
            [
                'name'=>'แรปบิทเทล จำกัด',
                'address'=>'1706/34, พระรามที่ 6, รองเมือง, ปทุมวัน, กรุงเทพมหานคร 10330',
                'logo'=>'',
                'district_id'=>1,
                'province_id'=>1,
                'prove'=>"none",
                'juristic'=>"none",
            ],
            [
                'name'=>'กราฟปิ้ก จำกัด',
                'address'=>'อาคารพร้อมพันธุ์ 1 ซอย ลาดพร้าว 3 เขตจตุจักร กรุงเทพมหานคร 10900',
                'logo'=>'',
                'district_id'=>1,
                'province_id'=>1,
                'prove'=>"none",
                'juristic'=>"none",
            ],
            
            [
                'name'=>'อินสปาย ดิจิตัล จำกัด',
                'address'=>'148/11 ซอย เอกชัย76 แยก 2-5
                แขวงคลองบางพราน เขตบางบอน กรุงเทพมหานคร 10150',
                'logo'=>'',
                'district_id'=>1,
                'province_id'=>1,
                'prove'=>"none",
                'juristic'=>"none",
            ],
            [
                'name'=>'คิดเยอะ ครีเอทีฟ จำกัด',
                'address'=>'51, ปู่เจ้าสมิงพราย, บางหัวเสือ, พระประแดง, สมุทรปราการ 10130',
                'logo'=>'',
                'district_id'=>1,
                'province_id'=>1,
                'prove'=>"none",
                'juristic'=>"none",
            ],
        ]);
    }
}
