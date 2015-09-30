<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MessageTableSeeder extends Seeder
{

    public function run()
    {
        //$faker = Faker\Factory::create();

        factory(\App\Models\Channel::class)->create();

        foreach (range(1, 10) as $counter) {
            factory(\App\Models\Message::class)->create();
        }
    }
}