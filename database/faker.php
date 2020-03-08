<?php

require_once '../Base/init.php';

use App\Models\User;
use App\Models\File;
use Base\DbConnection;

$dbConnection = new DbConnection();
$dbConnection->openConnection();

$faker = Faker\Factory::create('ru_Ru');

for ($i = 0; $i < 10; $i++) {
    $user = new User();
    $user->name = $faker->name;
    $user->age = mt_rand(10, 30);
    $user->email = $faker->email;
    $user->description = $faker->realText(100);
    $user->password = $faker->password;
    $user->save();

    $imageUrl = $faker->imageUrl(100, 100, 'cats', true);
    if (isset($imageUrl)) {
        $filePath = '/images/' . md5(microtime()) . '.png';
        file_put_contents('../public' . $filePath, file_get_contents($imageUrl));

        $file = new File();
        $file->name = $filePath;
        $file->user_id = $user->getKey('id');
        $file->save();
    }
}

echo 'Таблицы успешно заполнены фейковыми данными.' . PHP_EOL;
