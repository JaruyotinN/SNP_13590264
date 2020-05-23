<?php

use Illuminate\Database\Seeder;

class StudentPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_posts')->insert([
            [
                'stu_id'=> 1,
                'user_id'=> 1,
                'title'=>'ทำงานออกแบบเว็บ Hospital Eye ',
                'description'=>'ทำงาน UX/UI ของโรงพยาบาลครั้งแรก รู้สึกเครียดๆ เพราะทางบริษัทคาดหวังกับผลงานชิ้นนี่้มากๆ
                ผมจะพยายามทำสุดความสามารถเลยครับ',
            ],
            [
                'stu_id'=> 1,
                'user_id'=> 1,
                'title'=>'ออฟฟิศ Wongnai เป็นสังคมสุดชิวววว',
                'description'=>'บรรยากาศที่นี่เป็นอะไรที่ชิวมากกกกกกก และสนุก ไม่เครียดเลยครับ ให้ฟีลเหมือนอยู่ใต้คณะที่มหาลัยมากๆ ไม่รู้ว่าคณะอื่นๆ เป็นไหม แต่สำหรับวารสารที่ปายเรียนอยู่คือฟีลคล้ายๆ แบบนี้เลยครับ เสียงอาจจะดังหน่อย อาจจะมีตะโกนบ้าง 55555555',
            ],
        ]);
    }
    
}
