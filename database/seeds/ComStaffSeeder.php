<?php

use Illuminate\Database\Seeder;

class ComStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('company_staff')->insert([
            [    
                'name'=>'ฐนาธร',
                'surname'=>'แสนหาญ',
                'division'=>'Future Trends',
                'img'=>'',
                'career'=>'Designer',
                'email'=>'tanatorn@likeme.com',
                'phonenumber'=>'09x-xxx-xxxx',
                // 'event_id'=>1,
                'com_id'=>1,
            ],
            [    
                'name'=>'อัญธิกา',
                'surname'=>'กรุยทอง',
                'division'=>'Uppercuz Creative Co.LTD',
                'img'=>'',
                'career'=>'Graphic Designer',
                'email'=>'atika_g@Uppercuz.com',
                'phonenumber'=>'09x-xxx-xxxx',
                // 'event_id'=>2,
                'com_id'=>2,
            ],
            
            [    
                'name'=>'จีรญาดา',
                'surname'=>'กิจธนะภพรุ่ง',
                'division'=>'Rabbit Digital Group',
                'img'=>'',
                'career'=>'Designer',
                'email'=>'jirada@RabbitDigital.com',
                'phonenumber'=>'09x-xxx-xxxx',
                // 'event_id'=>3,
                'com_id'=>3,
            ],
            [    
                'name'=>'นพมล',
                'surname'=>'วงษ์เซ็ง',
                'division'=>'Grappik Creative Design',
                'img'=>'',
                'career'=>'Creative',
                'email'=>'navamon@grappik.com',
                'phonenumber'=>'09x-xxx-xxxx',
                // 'event_id'=>4,
                'com_id'=>4,
            ],
            [    
                'name'=>'ธัญญ์ฐนนท์',
                'surname'=>'พานิชเจริญ',
                'division'=>'Inspire Digital Co.LTD',
                'img'=>'',
                'career'=>'Senoir Designer',
                'email'=>'Panichalern@Inspiredigi.com',
                'phonenumber'=>'09x-xxx-xxxx',
                // 'event_id'=>5,
                'com_id'=>5,
            ],
           
            [    
                'name'=>'กชนิภา',
                'surname'=>'ลิลิตตระกูล',
                'division'=>'Kidyer digital creative agency',
                'img'=>'',
                'career'=>'Content Creator',
                'email'=>'Kodnipa@kidyer.com',
                'phonenumber'=>'09x-xxx-xxxx',
                // 'event_id'=>6,
                'com_id'=>6,
            ],
            [    
                'name'=>'พานทอง',
                'surname'=>'ส่องสว่างจิต',
                'division'=>'BANGKOK WEB SOLUTION',
                'img'=>'',
                'career'=>'Senoir Devloper',
                'email'=>'pantong@bkkweb.com',
                'phonenumber'=>'09x-xxx-xxxx',
                'com_id'=>7,
            ],
            [    
                'name'=>'สิทิกร',
                'surname'=>'ผ่องใส',
                'division'=>'Miracle Life Coach',
                'img'=>'',
                'career'=>'Senoir Devloper',
                'email'=>'sitikorn@miraclelife.com',
                'phonenumber'=>'09x-xxx-xxxx',
                'com_id'=>8,
            ],
            [    
                'name'=>'พรเทพ',
                'surname'=>'เจริญกิจ',
                'division'=>'Robert Bosch Limited',
                'img'=>'',
                'career'=>'Devloper',
                'email'=>'pontep@robertbosch.com',
                'phonenumber'=>'09x-xxx-xxxx',
                'com_id'=>9,
            ],
            


        ]);
}
}
