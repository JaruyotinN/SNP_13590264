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
                'logo'=>'/uploads/images/comevents/likeme.jpg',
                'email'=>'hr@likemeasia.com',
                'phonenumber'=>'0812345678',
                'amphure_id'=>1,
                'province_id'=>1,
                'juristic'=>"none",
                'profile_id'=>3,
            ],
            [
                'name'=>'อัปเปอร์คัซ ครีเอทีฟ จำกัด',
                'address'=>'101/24, ท่าแร้ง, บางเขน, กรุงเทพมหานคร 10220',
                'logo'=>'',
                'email'=>'contact@uppercuz.com',
                'phonenumber'=>'0812345678',
                'amphure_id'=>1,
                'province_id'=>1,
                'juristic'=>"none",
                'profile_id'=>NULL,
            ],
            [
                'name'=>'แรปบิทเทล จำกัด',
                'address'=>'1706/34, พระรามที่ 6, รองเมือง, ปทุมวัน, กรุงเทพมหานคร 10330',
                'logo'=>'',
                'email'=>'jump@rabbitstale.com',
                'phonenumber'=>'0812345678',
                'amphure_id'=>1,
                'province_id'=>1,
                'juristic'=>"none",
                'profile_id'=>NULL,
            ],
            [
                'name'=>'กราฟปิ้ก จำกัด',
                'address'=>'อาคารพร้อมพันธุ์ 1 ซอย ลาดพร้าว 3 เขตจตุจักร กรุงเทพมหานคร 10900',
                'logo'=>'',
                'email'=>'works@grappik.com',
                'phonenumber'=>'0812345678',
                'amphure_id'=> 1,
                'province_id'=> 1,
                'juristic'=>"none",
                'profile_id'=>NULL,
            ],
            [
                'name'=>'อินสปาย ดิจิตัล จำกัด',
                'address'=>'148/11 ซอย เอกชัย76 แยก 2-5
                แขวงคลองบางพราน เขตบางบอน กรุงเทพมหานคร 10150',
                'logo'=>'',
                'email'=>'Sales@inspiredigital.co.th',
                'phonenumber'=>'0812345678',
                'amphure_id'=>1,
                'province_id'=>1,
                'juristic'=>"none",
                'profile_id'=>NULL,
            ],
            [
                'name'=>'คิดเยอะ ครีเอทีฟ จำกัด',
                'address'=>'51, ปู่เจ้าสมิงพราย, บางหัวเสือ, พระประแดง, สมุทรปราการ 10130',
                'logo'=>'',
                'email'=>'info@creden.co',
                'phonenumber'=>'0812345678',
                'amphure_id'=>1,
                'province_id'=>1,
                'juristic'=>"none",
                'profile_id'=>NULL,
            ],
            [
                'name'=>'บริษัท บางกอก เว็บ โซลูชั่น จำกัด',
                'address'=>'182 หมู่บ้านตะวันรุ่ง ซอย 7 ถ.ลาดพร้าว 64 แยก 4
                วังทองหลาง, วังทองหลาง, กรุงเทพมหานคร, 10310',
                'logo'=>'',
                'email'=>'Info@bangkokwebsolution.com',
                'phonenumber'=>'0812345678',
                'amphure_id'=>1,
                'province_id'=>1,
                'juristic'=>"none",
                'profile_id'=>NULL,
            ],
            [
                'name'=>'บริษัท มิราเคิล ไลฟ์ โค้ช จำกัด',
                'address'=>'797/26 อาคาร H ชั้น 3 Happy Condo ลาดพร้าว 101 ถนนลาดพร้าว 101 แขวงคลองเจ้าคุณสิงห์ เขตบึงทองหลาง 10240
                กรุงเทพมหานคร',
                'logo'=>'',
                'email'=>'LifeCoach.co.th@gmail.com',
                'phonenumber'=>'0812345678',
                'amphure_id'=>1,
                'province_id'=>1,
                'juristic'=>"none",
                'profile_id'=>NULL,
            ],
            [
                'name'=>'Robert Bosch Limited',
                'address'=>'เอฟวายไอ เซ็นเตอร์ อาคาร1 ชั้น4 เลขที่ 2525 ถนนพระราม 4
                คลองเตย, คลองเตย, กรุงเทพมหานคร, 10110',
                'logo'=>'',
                'email'=>'‎Info.help@th.bosch.com',
                'phonenumber'=>'0812345678',
                'amphure_id'=>1,
                'province_id'=>1,
                'juristic'=>"none",
                'profile_id'=>NULL,
            ],
        ]);
    }
}
