<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class InitController extends Controller
{
    private $models = [
        'User',
        'PostStatus',
        'ReactionType',
        'Post',
        'Comment',
        'Reply',
        'Reaction',
    ];

    public function migrations()
    {

        $tables = [
            'post_statuses',
            'reaction_types',
            'posts',
            'comments',
            'replies',
            'reactions',
        ];

        foreach ($tables as $table) {
            Artisan::call('make:migration', [
                'name' => "create_$table",
            ]);

            sleep(1);
        }

    }

    public function controllers()
    {

        foreach ($this->models as $model) {
            Artisan::call('make:controller', [
                'name' => $model.'Controller',
                // '-r' => true
                '--api' => true,
            ]);
        }
    }

    public function models()
    {
        foreach ($this->models as $model) {
            Artisan::call('make:model', [
                'name' => $model,
            ]);
        }
    }

    public function all()
    {
        foreach ($this->models as $model) {
            Artisan::call('make:model', [
                'name' => $model,
                '--all' => true,
                '--api' => true,
                '--force' => true,
            ]);

            sleep(1);
        }
    }
}
