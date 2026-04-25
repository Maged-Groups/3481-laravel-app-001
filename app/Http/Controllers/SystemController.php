<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class SystemController extends Controller
{
    private $models = [
        'Hospital',
        'Library',
        'School',
        'Cinama',
        'Cafe,',
    ];

    public function model()
    {
        foreach ($this->models as $model) {
            Artisan::call('make:model', [
                'name' => $model,
                '-a' => true,
            ]);
        }
    }

    public function controllers()
    {

        foreach ($this->models as $class) {
            Artisan::call('make:controllers', [
                'name' => $class.'Controllers',
                '--api' => true,
                '--no-interaction' => true,
            ]);
        }
    }

    public function migrations()
    {
        foreach ($this->models as $table) {
            Artisan::call('make:migration', [
                'name' => "create_$table",
            ]);
            sleep(1);
        }
    }
}
