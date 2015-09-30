<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        //$faker = Faker\Factory::create();

        //user1
        factory(\App\Models\User::class)->create([
            'name' => 'user1',
            'email' => 'user1@site.dev',
            'password' => Hash::make('user1'),
        ]);

        //user2
        factory(\App\Models\User::class)->create([
            'name' => 'user2',
            'email' => 'user2@site.dev',
            'password' => Hash::make('user2'),
        ]);

    }
}