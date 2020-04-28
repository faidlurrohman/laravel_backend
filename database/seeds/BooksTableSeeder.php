<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 25; $i++) {
            Book::create([
                'name' => $faker->name,
                'qty' => $faker->randomNumber(2),
            ]);
        }
    }
}
