<?php

namespace Base;

use Illuminate\Database\Capsule\Manager as Capsule;

class DbConnection
{
    private $capsule;

    public function openConnection()
    {
        if (!$this->capsule) {
            $this->capsule = new Capsule;

            $this->capsule->addConnection([
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => 'mvc',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
                'collation' => 'utf8_general_ci',
                'prefix' => ''
            ]);
            $this->capsule->setAsGlobal();
            $this->capsule->bootEloquent();
        }

        return $this->capsule;
    }
}
