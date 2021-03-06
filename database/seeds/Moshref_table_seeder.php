<?php

use Illuminate\Database\Seeder;

class Moshref_table_seeder extends Seeder
{

    public function run()
    {
        $user = \App\User::create([
            'first_name' => 'El ',
            'last_name' => 'Moshref',
            'email' => 'moshref@app.com',
            'password' => bcrypt('password'),
        ]);
        $user->attachRole('moshref');
    }
}
