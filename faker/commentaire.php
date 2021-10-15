<?php

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';
require_once '../config/formText.php';


$faker = Faker\Factory::create();

for ($i = 0; $i < 300; $i++) {

    $com = $faker->text($maxNbChars = 200);

   

    $sql = "SELECT id FROM users ORDER BY RAND() LIMIT 1";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();


    $sql = "SELECT id FROM projets ORDER BY RAND() LIMIT 1";
    $result = $mysqli->query($sql);
    $projet = $result->fetch_assoc();
    

    
 
    $sql = "INSERT INTO commentaires(user,projet,comment) VALUES ('".$user['id']."','".$projet['id']."','".$com."')";
    if ($mysqli->query($sql) === true){
        echo'benef<br>';
    } else {
        echo $mysqli->error.'<br>';
    }
    

}