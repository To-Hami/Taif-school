<?php

use Illuminate\Database\Seeder;

class classroomsSecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            'الصف الاول'  ,' الصف الثاني' ,' الصف الثالث'
        ];

        $e_ids = [
            1  ,2 ,3 ,4,5
        ];

        foreach ($classes as $class){


            \App\Models\Classroom_sec::create([
                'Name_Class' => $class,
                'Grade_id' =>3,

            ]);

        }
    }
}
