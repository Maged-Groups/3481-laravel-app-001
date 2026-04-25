<?php

namespace Database\Seeders;

use App\Models\PostStatus;
use Illuminate\Database\Seeder;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post Statuses
        $post_status_types = [
            'pending',
            'published',
            'canceled',
            'postponed',
            'draft',
            'private',
        ];

        foreach ($post_status_types as $type) {
            PostStatus::factory()->create([
                'type' => $type,
            ]);
        }
    }
}
