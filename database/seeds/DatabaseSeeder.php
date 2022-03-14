<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Regular User',
               'email'=>'user@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('12345678'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }

}
