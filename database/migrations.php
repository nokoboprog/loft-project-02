<?php

require_once '../Base/init.php';

use Base\DbConnection;
use Illuminate\Database\Capsule\Manager as Capsule;

$dbConnection = new DbConnection();
$dbConnection->openConnection();

Capsule::schema()->dropIfExists('users');
Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->integer('age')->unsigned();
    $table->text('description');
    $table->string('password');
});

Capsule::schema()->dropIfExists('files');
Capsule::schema()->create('files', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->integer('user_id')->unsigned();
});

echo 'Таблицы успешно создались.' . PHP_EOL;
