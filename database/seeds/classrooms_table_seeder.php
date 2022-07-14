<?php

use Illuminate\Database\Seeder;

class classrooms_table_seeder extends Seeder
{

    public function run()
    {

        $classes = [
            'الصف الاول'  ,' الصف الثاني' ,' الصف الثالث' ,' الصف الرابع','الصف الخامس','الصف السادس'
        ];

        $e_ids = [
           1  ,2 ,3 ,4,5
        ];

            foreach ($classes as $class){


                    \App\Models\Classroom::create([
                        'Name_Class' => $class,
                        'Grade_id' =>1,

                    ]);

            }



    }
}
