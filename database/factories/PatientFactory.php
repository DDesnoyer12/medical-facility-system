<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'pid' => $faker->PID,
        'FName' => $faker->FName,
        'LName' => $faker->LName,
        'DoB' => $faker->DoB,
        'Gender' => $faker->Gender,
        'Phone' => $faker->Phone,
        'Address' => $faker->Address,
        'Zip' => $faker->Zip,
        'InsuranceType' => $faker->InsuranceType
    ];
});
