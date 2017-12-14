<?php

use Faker\Generator as Faker;

require_once __DIR__ . '/../faker_data/document_number.php';

$factory->define(App\Client::class, function (Faker $faker) {

    return [
        'name' => $faker->name,

        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'defaulter' => rand(0,1),
    ];
});

$factory->state(\App\Client::class, \App\Client::TYPE_INDIVIDUAL, function (Faker $faker){
    $cpfs = cpfs();
    return [
        'document_number' => $cpfs[array_rand($cpfs, 1)],
        'date_birth' => $faker->date(),
        'sex' => rand(1, 10) % 2 == 0 ? 'm' : 'f',
        'marital_status' => rand(1,4),
        'deficiency' => rand(1, 6),
        'client_type' => \App\Client::TYPE_INDIVIDUAL

    ];
});

$factory->state(\App\Client::class ,\App\Client::TYPE_LEGAL, function (Faker $faker){
    $cnpjs= cnpjs();
    return [
        'document_number' => $cnpjs[array_rand($cnpjs, 1)],
        'company_name' => $faker->company,
        'client_type' => \App\Client::TYPE_LEGAL
    ];
});

/*$table->string('name');
$table->string('document_number');
$table->string('email');
$table->string('phone');
$table->string('defaulter'); //Inadimplente;
$table->date('date_birth');
$table->char('sex', 10);
$table->enum('marital-status', array_keys(\App\Client::MARITAL_STATUS));
$table->enum('deficiency', array_keys(\App\Client::DEFICIENCY));*/