<?php

use App\Models\Category;
use App\Models\Like;
use App\Models\Question;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(User::class, 10)->create();
        factory(Category::class, 10)->create();
        factory(Question::class, 10)->create();
        factory(Reply::class, 50)->create()->each(function ($reply) {
            $reply->likes()->save(factory(Like::class)->make());
        });
    }
}
