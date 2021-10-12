<?php

require_once 'config/framework.php';
require_once 'config/connect.php';


if (!isset($_SESSION['user'])) {
  redirectToRoute();
}

$errors= [];




dump($_SESSION['user']);
  

if (isset($_POST['token_pseudo']) && $_POST['token_pseudo'] === $_SESSION['token_pseudo']) {

  

    if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30 ) 
    {
    $errors['pseudo'] = '<br>Pseudo trop petit ou trop grand (+ de 3 ou - de 30)';
    }
    else {
      
      $sql= "UPDATE users SET pseudo = '".$_POST['pseudo']."' WHERE id = '".$_SESSION['user']['id']."'";
      if ($mysqli->query($sql) === true) {
          redirectToRoute('/deconnexion.php');
      } else {
          echo 'Une erreur est survenue. Veuillez recommencer';
  
    }
  }
}

if (isset($_POST['token_email']) && $_POST['token_email'] === $_SESSION['token_email']) {

  // modif email 

  if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30 ) 
  {
  $errors['pseudo'] = '<br>Pseudo trop petit ou trop grand (+ de 3 ou - de 30)';
  }
  else {
    
    $sql= "UPDATE users SET pseudo = '".$_POST['pseudo']."' WHERE id = '".$_SESSION['user']['id']."'";
    if ($mysqli->query($sql) === true) {
        redirectToRoute('/deconnexion.php');
    } else {
        echo 'Une erreur est survenue. Veuillez recommencer';

    }
  }
}


  





?>
<!doctype html>
<html lang="fr">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>Compte</title>
  </head>
  <body>
    

    <div class="m-a">
      <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 m-auto">
        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
          Compte de <?= $_SESSION['user']['pseudo'];?>
        </p>

        

        <form class="mx-1 mx-md-4" method="post" >
          <input type="hidden"name="token_pseudo" value="<?= miniToken('token_pseudo'); ?>">
          

          <div class="d-flex flex-row align-items-center mb-1">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="pseudo"  class="form-control" name="pseudo" id="pseudo"/>
              <label class="form-label" for="pseudo">Pseudo</label>
              <p><?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?></p>

              
            </div>
          </div>
          
          <button type="submit" id="btnpseudo"  class="btn btn-primary ">Changer de pseudo</button>
          
          
        </form>





































        <form class="mx-1 mx-md-4" method="post" >
          <input type="hidden"name="token" value="<?= miniToken(); ?>">
          

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="email"  class="form-control" name="email" id="email"/>
              <label class="form-label" for="email">E-mail</label>
              
            </div>
          </div>

          

          <div class="d-flex justify-content-center m-4">
            <button type="submit" id="submit" name="submit" class="btn btn-primary ">Changer d'email</button>
          </div>
          
        </form>
        









        <form class="mx-1 mx-md-4" method="post" >
          <input type="hidden"name="token" value="<?= miniToken(); ?>">
          

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="password"  class="form-control" name="password" id="password"/>
              <label class="form-label" for="password">Mot de passe</label>
              
            </div>
          </div>

          <div class="d-flex justify-content-center m-4">
            <button type="submit" id="submit" name="submit" class="btn btn-primary ">Changer de mot de passe</button>
          </div>
          
        </form>

        <div class="d-flex justify-content-center m-4">
            <button type="submit" id="submit" name="submit" class="btn btn-primary ">Supprimer la compte</button>
        </div>





    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    
  </body>
</html>
