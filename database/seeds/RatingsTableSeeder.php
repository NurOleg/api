<?php

use App\Ratings;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->delete();
        for ($i = 0; $i < 1000000; $i++) {
            Ratings::create(
                [
                    'value' => rand(0, 5),
                    'article_id' => rand(1, 200000),
                ]
            );
        }
    }
}
