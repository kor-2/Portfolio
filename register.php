<?php
// http://localhost:8000

require_once 'config/framework.php';
require_once 'config/connect.php';

$error=[];





if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {

  if(isset($_POST['pseudo'])){
    if (strlen($_POST['pseudo']) <= 3 ) {
      $error['pseudo'] = '<br>Pseudo trop petit (5)';
    }
    if (strlen($_POST['pseudo']) >= 30 ) {
      $error['pseudo'] = '<br>Pseudo trop grand (30)';
    }
  
  }
  if(isset($_POST['email']) && empty($_POST['email'])){
    $error['email'] = '<br>E-mail invalide ou vide';
  }
  if(isset($_POST['password']) && empty($_POST['password']) && $_POST['password'] !== $_POST['passwordConf'] ){
    
    
    $error['passwordConf'] = '<br>Mot de passe invalide';
  }
  if (empty($errors)) {
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    dump($password_hash);
    $sql= "INSERT INTO users(email, password, pseudo, roles) VALUES ('value-1','".$password_hash."','".$_POST['pseudo']."','".json_encode(['ROLE_USER'])."')";
    if ($mysqli->query($sql) === true) {
      redirectToRoute('/login.php');
    } else {
      echo 'Base de donnée introuvable ;(';
    }
  }
  else {
    echo 'pas bon :/';
  }

}











?>




<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    />

    <title>Register</title>
  </head>
  <body>
    <div class="m-a">
      <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 m-auto">
        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
          Créer un compte
        </p>

        <form class="mx-1 mx-md-4" method="post" >
          <input type="hidden"name="token" value="<?= miniToken(); ?>">
          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="text"  class="form-control" name="pseudo" id="pseudo"/>
              <label class="form-label" for="pseudo">Pseudo</label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="email"  class="form-control" name="email" id="email"/>
              <label class="form-label" for="email">E-mail</label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="password"  class="form-control"  name="password" id="password"/>
              <label class="form-label" for="password">Mot de passe</label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="password"  class="form-control" name="passwordConf" id="passwordConf"/>
              <label class="form-label" for="passwordConf"
                >Confirmer votre mot de passe</label
              >
            </div>
          </div>

          <div class="d-flex justify-content-center m-4">
            <button type="submit" class="btn btn-primary ">S'inscrire</button>
          </div>
          
        </form>
        <div class="d-flex justify-content-center m-4">
            <a href="/" class="btn btn-primary  ">Page d'acceuil</a>
          </div>
          <div class="d-flex justify-content-center m-4">
            <a href="login.php" class="btn btn-primary  ">Se connecter</a>
          </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
