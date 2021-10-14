<?php

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';



$faker = Faker\Factory::create();

for ($i = 0; $i < 10; $i++) {

  $pseudo = $faker->userName;
  $email = $faker->freeEmail ;
  $pass= $faker->password() ;
  $password_hash = password_hash($pass, PASSWORD_DEFAULT);

  $sql= "INSERT INTO users(email, password, pseudo, roles) VALUES ('".$email."','".$password_hash."','".$pseudo."','".json_encode(['ROLE_USER'])."')";
    if ($mysqli->query($sql) === true)
    {
      echo'benef';
    } else {
      echo 'Base de donnée indisponible';
    }
  }