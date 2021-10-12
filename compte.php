<?php

require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'login.php';

?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>Compte</title>
  </head>
  <body>
    <h1>Compte</h1>

    <form action="post">
      
      <label for="psuedo"></label>
      <input type="text" class="form-control" id="pseudo">
      <button type="submit" class="btn btn-primary">Changer de pseudo</button>
    </form>

    <form action="post">
      <?php

      echo $_SESSION['pseudo'];     
      
      ?>

      <input type="text" class="form-control" id="email">
      <button type="submit" class="btn btn-primary">Changer d'email</button>
    </form>
    <form action="post">
      <?php
      
      
      ?>

      <input type="text" class="form-control" id="password">
      <button type="submit" class="btn btn-primary">Changer de mot de passe</button>
    </form>



    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script>

    
  </body>
</html>
