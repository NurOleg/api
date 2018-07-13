<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'user_login' => 'rand_user' . $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        for ($i = 0; $i < 200000; $i++) {
            \Illuminate\Support\Facades\DB::table('articles')->insert([
                'user_login' => 'rand_user' . rand(1, 99),
                'title' => 'Great title for article' . $i,
                'content' => 'Great title for article' . $i,
                'user_ip' => '192.188.234.' . rand(0, 50),
            ]);
        }

        for ($i = 0; $i < 1000000; $i++) {
            \Illuminate\Support\Facades\DB::table('ratings')->insert([
                'value' => rand(1, 5),
                'article_id' => rand(1, 99),
            ]);
        }
    }
}
