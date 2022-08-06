<?php

use Illuminate\Database\Seeder;

class Response_table_seeder extends Seeder
{

    public function run()
    {
        DB::table('respons')->delete();


            \App\Respons::create([
                'name' => 'Bader',
                'email' => 'tohami00076@gmail.com',
            ]);

    }
}
