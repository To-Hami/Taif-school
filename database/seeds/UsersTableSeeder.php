<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $emails = ['tohami00076@gmail.com','admin@app.com'];

        foreach ( $emails as $email ){

            $user = \App\User::create([
                'first_name' => 'super',
                'last_name' => 'admin',
                'email' => $email ,
            'password' => bcrypt('password'),
        ]);
            $user->attachRole('super_admin');
        }



    }
}
