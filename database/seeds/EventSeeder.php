<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('comevents')->insert([
                [   
                    'division'=> "Future Trend", 
                    'desciption'=> "บริษัท ไลค์มี จำกัดนั้นเป็นบริษัทที่มีแบร์ดหลากหลาย ทั้ง InfographicThailand , AomMoeny , ถุงเงิน Family , Future Trends",
                    'quantity' => 'รับหลายอัตรา',
                    'jobtime' => '10.00 - 18.00',
                    'reward' => '-',
                    'staff_id' => 1,
                    'requirement'=> "Graphic Desinger",
                    'img'=> "/uploads/images/comevents/1581243398.png",
                    'question1'=> "Question01",
                    'question2'=> "Question02",
                    'enddate'=> '2020-07-06',
                    'com_id'=> 1,
                    'job_id'=>8,
                    'invite'=> 5,
                ],
                [   
                    'division'=> "Uppercuz trainee #10", 
                    'desciption'=> "ศึกครานี้ใหญ่หลวงนักเตรียมตัวให้พร้อมเหล่าผู้กล้าทั้งหลาย เพราะการคัดเลือก นักศึกษาฝึกงาน Uppercuz trainee #10กำลังจะมาแล้ว! ",
                    'quantity' => 'รับหลายอัตรา',
                    'jobtime' => '10.00 - 18.00',
                    'reward' => '-',
                    'staff_id' => 2,
                    'requirement'=> "Graphic Designer",
                    'img'=> "/uploads/images/comevents/uppercuz.jpg",
                    'question1'=> "Question01",
                    'question2'=> "Question02",
                    'enddate'=> '2020-05-06',
                    'com_id'=> 2,
                    'job_id'=>8,
                    'invite'=> 5,
                ],
                [   
                    'division'=> "Rabbit Digital Group", 
                    'desciption'=> "Rabbit Digital Group ขอชวนน้องๆพร้อมจั๊มป์ด้วยกันกับ LAB Rabbit รุ่นที่ 1 โครงการกระต่ายลองงาน สร้างคุณให้กลายเป็นกระต่ายดัดแปลงที่แข็งแกร่งกว่าเดิม!",
                    'quantity' => 'รับหลายอัตรา',
                    'jobtime' => '10.00 - 18.00',
                    'reward' => '-',
                    'staff_id' => 3,
                    'requirement'=> "Graphic Desinger",
                    'img'=> "/uploads/images/comevents/RabbitTale.jpg",
                    'question1'=> "Question01",
                    'question2'=> "Question02",
                    'enddate'=> '2020-05-06',
                    'com_id'=> 3,
                    'job_id'=>8,
                    'invite'=> 5,
                ],
                [   
                    'division'=> "Grappik", 
                    'desciption'=> "ถ้าคุณรักงานออกแบบและพร้อมคิดงานเจ๋งๆให้สมองได้ระเบิดไอเดียออกมา รีบมาสมัครฝึกงานกับเราได้เลยได้ทำงานจริง ลุยสนามจริง เจ็บจริง เจอสนามการทำงานของชีวิตจริง",
                    'quantity' => 'รับหลายอัตรา',
                    'jobtime' => '10.00 - 18.00',
                    'reward' => '-',
                    'staff_id' => 4,
                    'requirement'=> "Graphic Designer",
                    'img'=> "/uploads/images/comevents/Grappik.png",
                    'question1'=> "Question01",
                    'question2'=> "Question02",
                    'enddate'=> '2020-05-06',
                    'com_id'=> 4,
                    'job_id'=>8,
                    'invite'=> 5,
                ],
                [   
                    'division'=> "Inspire digital", 
                    'desciption'=> "รับสมัครนักศึกษาฝึกงาน สามารถออกแบบ Website Design ได้,ทำภาพเคลื่อนไหว motion graphicได้,มีความเข้าใจเรื่องของ CI และมีความคิดสร้างสรรค์ ทำงานเป็นระเบียบ",
                    'quantity' => 'รับหลายอัตรา',
                    'jobtime' => '10.00 - 18.00',
                    'reward' => '-',
                    'staff_id' => 5,
                    'requirement'=> "Graphic Designer",
                    'img'=> "/uploads/images/comevents/Inspire digital.jpg",
                    'question1'=> "Question01",
                    'question2'=> "Question02",
                    'enddate'=> '2020-06-06',
                    'com_id'=> 5,
                     'job_id'=>8,
                    'invite'=> 5,
                ],
                [   
                    'division'=> "kidyer",  
                    'desciption'=> "โอกาสสำหรับน้องๆ การทำงานแบบ Survivors เอาชีวิตรอดในเมืองกรุง สำหรับคนที่มี “ความคิด” เยอะ แต่ไม่รู้จะเอาไปปล่อยที่ไหน Kidyers ซึ่งทำงานด้าน Digital Creative Agency เปิดรับสมัครนักศึกษาฝึกงาน",
                    'quantity' => 'รับหลายอัตรา',
                    'jobtime' => '10.00 - 18.00',
                    'reward' => '-',
                    'staff_id' => 6,
                    'requirement'=> "Motion Graphic",
                    'img'=> "/uploads/images/comevents/kidyer.jpg",
                    'question1'=> "Question01",
                    'question2'=> "Question02",
                    'enddate'=> '2020-05-06',
                    'com_id'=> 6,
                    'job_id'=>8,
                    'invite'=> 5,
                ],
                
                
               
                
                
            ]);

    }
}
