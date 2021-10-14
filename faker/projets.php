<?php

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';



$faker = Faker\Factory::create();

for ($i = 0; $i < 10; $i++) {

    $title = $faker->company;
    $content = $faker->text($maxNbChars = 200);
   
}