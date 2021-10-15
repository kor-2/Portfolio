<?php

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';
require_once '../config/formText.php';


$faker = Faker\Factory::create();

for ($i = 0; $i < 300; $i++) {

    $title = $faker->sentence(rand(6, 10));
    $content = $faker->text($maxNbChars = 200);
    $image = 'http://lorempixel.com/640/480/';

    $creation = $faker->dateTimeBetween('-6 month', 'now');
    $creation = date_format($creation, 'Y-m-d H:i:s');
    
    $slug = slug($title);

    $sql = "SELECT id FROM users ORDER BY RAND() LIMIT 1";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    $statut = [false, true];
    shuffle($statut);

 
    $sql = "INSERT INTO projets(titre,content,image,creation,slug,statut,auteur) VALUES ('".$title."','".$content."','".$image."','".$creation."','".$slug."','".$statut[0]."','".$user['id']."')";
    if ($mysqli->query($sql) === true){
        echo'benef<br>';
    } else {
        echo $mysqli->error.'<br>';
    }
    

}