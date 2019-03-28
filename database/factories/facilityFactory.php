<?php

use Faker\Generator as Faker;

$factory->define(App\Facility::class, function (Faker $faker) {
  return [
    'facility_name' => $faker->company,
    'facility_bio' => $faker->realText($maxNbChars = 20, $indexSize = 1),
    'facility_type' => $faker->numberBetween($min = 1, $max = 7),
    'facility_address' => $faker->address,
    //    'facility_lat' => $faker->address->Latitude($maxNbChars = 20, $indexSize = 1),
    //    'facility_lng' => $faker->address->Longitude($maxNbChars = 20, $indexSize = 1),
    'facility_phone' => $faker->phoneNumber,
    'facility_fax' => $faker->realText($maxNbChars = 20, $indexSize = 1),
    'facility_email' => $faker->email,
    'facility_web_url' => $faker->url,
    'facility_price_adult' => $faker->numberBetween($min = 2000, $max = 3000),
    'facility_discounted_price_adult' => $faker->numberBetween($min = 1000, $max = 1500),
    'facility_price_child' => $faker->numberBetween($min = 1000, $max = 2000),
    'facility_discounted_price_child' => $faker->numberBetween($min = 500, $max = 1000),
    'facility_toilet' => $faker->boolean(90),
    'facility_signLanguage' => $faker->boolean(30),
    'facility_elevator' => $faker->boolean(70),
    'facility_slope' => $faker->boolean(50),
    'facility_wheelchair' => $faker->boolean(40),
    'facility_parking' => $faker->boolean(80),
  ];
});
