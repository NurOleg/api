<?php

use App\Articles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();
        for ($i = 0; $i < 200000; $i++) {
            Articles::create(
                [
                    'user_login' => 'randuser' . rand(0, 100),
                    'title' => 'Great title for article' . $i,
                    'content' => 'Great title for article' . $i,
                    'user_ip' => '192.188.234.' . rand(0, 50),
                ]
            );
        }
    }
}
