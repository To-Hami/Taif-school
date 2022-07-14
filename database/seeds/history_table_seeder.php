<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class history_table_seeder extends Seeder
{

    public function run()
    {
        DB::table('history')->delete();

            \App\Models\History::create([
                'name' => 'اسم المدرسة',
                'manager_name' =>'اسم المدير',
                'manager_email' => 'البريد الالكتروني',
                'manager_phone' =>'000',
                'number' =>'000',
                'history' => '000',
                'grade' =>1,
                'location' =>'-----',

            ]);

    }
}
