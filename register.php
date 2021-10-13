<?php
// http://localhost:8000

require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'asset/default_template/header.php';

$error=[];

if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) 
{

  
  if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30 ) 
  {
    $error['pseudo'] = '<br>Pseudo trop petit ou trop grand (+ de 3 ou - de 30)';
  }
  if(isset($_POST['email']) && !preg_match('#^[\w.-]+@[\w.-]+.[a-z]{2,6}$#i', $_POST['email']))
  {
    $error['email'] = '<br>E-mail invalide ou vide';
  }
  if(isset($_POST['password']) && !empty($_POST['password']) && $_POST['password'] === $_POST['passwordConf'] )
  {
    
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }
  else {
    $error['passwordConf'] = '<br>Mot de passe invalide';
  }
  if (empty($error)) 
  {
   
    $sql= "INSERT INTO users(email, password, pseudo, roles) VALUES ('".$_POST['email']."','".$password_hash."','".$_POST['pseudo']."','".json_encode(['ROLE_USER'])."')";
    if ($mysqli->query($sql) === true)
    {
      redirectToRoute('/login.php');
    } else {
      echo 'Base de donnée indisponible';
    }
  }
}
?>

<div class="m-a mt-5">
  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 m-auto pt-4">
    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
      Créer un compte
    </p>

    <form class="mx-1 mx-md-4" method="post" >
      <input type="hidden"name="token" value="<?= miniToken(); ?>">
      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <input type="text"  class="form-control" name="pseudo" id="pseudo"/>
          <small id="pseudo" class="form-text text-muted"><?= isset($errors['pseudo']) ? $errors['pseudo'] : ''?></small>
          <label class="form-label" for="pseudo">Pseudo</label>
        </div>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <input type="email"  class="form-control" name="email" id="email"/>
          <small id="pseudo" class="form-text text-muted"><?= isset($errors['email']) ? $errors['email'] : ''?></small>
          <label class="form-label" for="email">E-mail</label>
        </div>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <input type="password"  class="form-control"  name="password" id="password"/>
          <small id="pseudo" class="form-text text-muted"><?= isset($errors['passwordConf']) ? $errors['passwordConf'] : ''?></small>
          <label class="form-label" for="password">Mot de passe</label>
        </div>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <input type="password"  class="form-control" name="passwordConf" id="passwordConf"/>
          <small id="pseudo" class="form-text text-muted"><?= isset($errors['passwordConf']) ? $errors['passwordConf'] : ''?></small>
          <label class="form-label" for="passwordConf"
            >Confirmer votre mot de passe</label
          >
        </div>
      </div>

      <div class="d-flex justify-content-center m-4">
        <button type="submit" class="btn btn-primary ">S'inscrire</button>
      </div>
      
    </form>

    
  </div>
</div>

<?php  require_once 'asset/default_template/footer.php'; ?>
