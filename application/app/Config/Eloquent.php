<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;
use Illuminate\Database\Capsule\Manager as Capsule;

class Eloquent extends BaseConfig
{
    public function init()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => env('database.default.hostname'),
            'port'      => env('database.default.port'),
            'database'  => env('database.default.database', 'ci4_blog'),
            'username'  => env('database.default.username'),
            'password'  => env('database.default.password'),
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}