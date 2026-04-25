<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // call the seeders in order
        $this->call([
            UserSeeder::class,
            PostStatusSeeder::class,
            ReactionTypeSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            ReplySeeder::class,
            // ReactionSeeder::class,
        ]);
    }
}
