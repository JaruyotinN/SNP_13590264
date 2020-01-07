<?php

use Illuminate\Database\Seeder;

class JobtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('joptypes')->insert([
            [   
                'job_id'=>1,
                'name'=>'Digital marketing'
            ],
            [   
                'job_id'=>1,
                'name'=>'Media Planner'
            ],
            [   
                'job_id'=>1,
                'name'=>'Branding marketing'
            ],
            [   
                'job_id'=>1,
                'name'=>'Marketing'
            ],
            [   
                'job_id'=>1,
                'name'=>'Account Executive'
            ],
            [   
                'job_id'=>2,
                'name'=>'ฝ่ายสรรหาและอบรม'
            ],
            [   
                'job_id'=>2,
                'name'=>'ฝ่ายบุคคล'
            ],
            [   
                'job_id'=>3,
                'name'=>'แผนกต้อนรับ'
            ],
            [   
                'job_id'=>3,
                'name'=>'แผนกงานครัว'
            ],
            [   
                'job_id'=>3,
                'name'=>'แผนกแม่บ้าน'
            ],
            [   
                'job_id'=>3,
                'name'=>'แผนกอาหารและเครื่องดื่ม'
            ],
            [   
                'job_id'=>3,
                'name'=>'แผนกประสานงาน(แปลภาษา)'
            ],
            [   
                'job_id'=>4,
                'name'=>'บริหารคลังสินค้า/Logistics'
            ],
            [   
                'job_id'=>5,
                'name'=>'Content Writer/Content Editor'
            ],
            [   
                'job_id'=>6,
                'name'=>'PR(public relation)'
            ],
            [   
                'job_id'=>6,
                'name'=>'Camera man'
            ],
            [   
                'job_id'=>6,
                'name'=>'Photographer'
            ],
            [   
                'job_id'=>6,
                'name'=>'Video Editor'
            ],
            [   
                'job_id'=>6,
                'name'=>'Creative'
            ],
            [   
                'job_id'=>7,
                'name'=>'Front-end Developer'
            ],
            [   
                'job_id'=>7,
                'name'=>'Back-end Developer'
            ],
            [   
                'job_id'=>7,
                'name'=>'Data Scientist'
            ],
            [   
                'job_id'=>7,
                'name'=>'Data Analyst'
            ],
            [   
                'job_id'=>7,
                'name'=>'iOS Developer'
            ],
            [   
                'job_id'=>7,
                'name'=>'Android Developer'
            ],
            [   
                'job_id'=>7,
                'name'=>'Unity Programmer'
            ],
            [   
                'job_id'=>8,
                'name'=>'Graphic Designer'
            ],
            [   
                'job_id'=>8,
                'name'=>'Motion Designer'
            ],
            [   
                'job_id'=>8,
                'name'=>'UI Designer'
            ],
            [   
                'job_id'=>8,
                'name'=>'UX Designer'
            ],
            [   
                'job_id'=>8,
                'name'=>'Product Designer'
            ],
            [   
                'job_id'=>8,
                'name'=>'Interior Designer'
            ],
            [   
                'job_id'=>8,
                'name'=>'Architectural Designer'
            ],
            [   
                'job_id'=>8,
                'name'=>'3D Artist'
            ],
            [   
                'job_id'=>8,
                'name'=>'2D Artist'
            ],
            [   
                'job_id'=>8,
                'name'=>'VFX Artist'
            ],
            [   
                'job_id'=>8,
                'name'=>'Composite Artist'
            ],
            [   
                'job_id'=>8,
                'name'=>'Interactive Designer'
            ],
            
        ]);
    }
}
