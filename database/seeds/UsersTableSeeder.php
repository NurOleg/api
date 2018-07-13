<?php

class UsersTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            \App\Users::create(
                [
                    'user_login' => 'randuser' . $i,
                ]
            );
        }
    }
}
