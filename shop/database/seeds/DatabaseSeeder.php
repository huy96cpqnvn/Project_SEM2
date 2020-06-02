<?php

use Illuminate\Database\Seeder;
use App\ProductDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i  = 0; $i < 10; $i++) {
            ProductDetail::create([
                'name' => $faker->sentence(4),
                'product_id' => '2',
                'cover' => $faker->sentence(4),
                'review' => $faker->sentence(4),
                'detail' => $faker->sentence(4),
                'price' => '50000',
                'status' => $faker->boolean($chanceOfGettingTrue = 90),
                'amount' => '2',
                'author_id' => '2',
                'language_id' => '1',
                'priceFilter_id' => '2',
                'publisher_id' => '1',
                'user_id' => '1',
                'discount_id' => '20'
            ]);
        }
    }
}
