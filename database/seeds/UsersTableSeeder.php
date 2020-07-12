<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //$user1->FELDNAME WIE IN ELOQUENT MODEL
        $user1 = new \App\User;
        $user1->firstname = 'Hannelore';
        $user1->lastname = 'Mayr';
        $user1->address = 'Bahnhofstrasse 97, 4230 Pregarten';
        $user1->email = 'hannelore.mayr@gmx.at';
        $user1->password = bcrypt('mayr2020');
        $user1->helper = false;

        $user1->save();

        //$user1->FELDNAME WIE IN ELOQUENT MODEL
        $user2 = new \App\User;
        $user2->firstname = 'Thomas';
        $user2->lastname = 'Hillinger';
        $user2->address = 'Hauptplatz 31, 4230 Prtegarten';
        $user2->email = 'hillinger.tom@gmx.at';
        $user2->password = bcrypt('123456');
        $user2->helper = true;

        $user2->save();

    }
}
