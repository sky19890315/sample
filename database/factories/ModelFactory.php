<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    $date_time = $faker->date . ' '. $faker->time;
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'is_admin'  =>  false,
        'activated' => true,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'created_at'    =>  $date_time,
        'updated_at'    =>  $date_time,
    ];
});*/
/*添加自动生成的微博*/
$factory->define(App\Models\Status::class , function (Faker\Generator $faker)
{
    $date_time = $faker->date . ' ' .$faker->time;

    return [
      'content'       =>      $faker->text(),
      'created_at'    =>  $date_time,
      'updated_at'    =>  $date_time,
    ];
});
/*添加自动生成用户2017年2月10日
修复生成用户密码错误问题 sky*/

$factory->define(App\Models\User::class ,function (Faker\Generator $faker)
{
    $date_time = $faker->date.''.$faker->time;
    static $password;

    return [

        'name' => $faker->name,
        'email' => $faker->safeEmail,
        /*修复无法密码为空的问题*/
        'password' => $faker->$password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
        'create_at' => $date_time,
        'update_at' => $date_time,

    ];
});


















