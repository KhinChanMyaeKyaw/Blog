<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Article::factory()->count(20)->create();
         \App\Models\Comment::factory(40)->create();

        User::factory()->create([
            "name"=> "Alice",
            "email"=> "alice@gmail.com",
        ]);
        User::factory()->create([
            "name"=> "Bob",
            "email"=> "bob@gmail.com",
        ]);


        $list= ["News", "Tech", "Computer","Mobile", "Network"];
        foreach($list as $name)
            \App\Models\Category::create(["name"=> $name]);
    }
}
