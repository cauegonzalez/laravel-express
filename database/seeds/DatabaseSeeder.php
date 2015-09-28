<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET foreign_key_checks = 0;');

        factory('App\User')->create(
            [
                'name' => "Caue Gonzalez",
                'email' => "cauegonzalez@gmail.com",
                'password' => bcrypt(12345),
                'remember_token' => str_random(10)
            ]
        );
        $this->call(UserTableSeeder::class);
//         $this->call(PostsTableSeeder::class);
//         $this->call(TagTableSeeder::class);

        DB::statement('SET foreign_key_checks = 1;');
        Model::reguard();
    }
}
