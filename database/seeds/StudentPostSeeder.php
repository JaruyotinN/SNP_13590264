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
                'title'=>'ทำงานออกแบบเว็บ Hospital Eye ',
                'description'=>'ทำงาน UX/UI ของโรงพยาบาลครั้งแรก รู้สึกเครียดๆ เพราะทางบริษัทคาดหวังกับผลงานชิ้นนี่้มากๆ
                ผมจะพยายามทำสุดความสามารถเลยครับ',
                'img'=>'',
            ]
        ]);
    }
}
