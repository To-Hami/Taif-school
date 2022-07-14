<?php

use Illuminate\Database\Seeder;

class classroomsMidSeeder extends Seeder
{

    public function run()
    {
        $classes = [
            'الصف الاول'  ,' الصف الثاني' ,' الصف الثالث'
        ];

        $e_ids = [
            1  ,2 ,3 ,4,5
        ];

        foreach ($classes as $class){


            \App\Models\Classroom_mid::create([
                'Name_Class' => $class,
                'Grade_id' =>2,

            ]);

        }

    }
}
