<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class InitController extends Controller
{
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

        foreach($tables as $table) {
            Artisan::call('make:migration', [
                'name' => "create_$table"
            ]);
            
            sleep(1);
        }

    }
}
