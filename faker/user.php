<?php

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';



$faker = Faker\Factory::create();

for ($i = 0; $i < 200; $i++) {

  $pseudo = $faker->userName;
  $email = $faker->freeEmail ;
  $pass= $faker->password() ;
  $password_hash = password_hash($pass, PASSWORD_DEFAULT);

  $roles = ['ROLE_USER'];
  $role = [false, true, false];

  shuffle($role);
  if ($role[0] === true) {
  array_unshift($roles, 'ROLE_MODERATEUR');
  }

  shuffle($role);
  if ($role[0] === true) {
  array_unshift($roles, 'ROLE_ADMIN');
  }
  

  $sql= "INSERT INTO users(email, password, pseudo, roles) VALUES ('".$email."','".$password_hash."','".$pseudo."','".json_encode($roles)."')";
    if ($mysqli->query($sql) === true) {
      echo'benef';
    } else {
      echo 'Base de donnée indisponible';
    }
}