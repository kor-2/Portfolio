<?php

require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'asset/default_template/header.php';


if (!isset($_SESSION['user'])) {
  redirectToRoute();
}

$errors= [];




//dump($_SESSION['user']);
  

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

   

  if(isset($_POST['email']) && !preg_match('#^[\w.-]+@[\w.-]+.[a-z]{2,6}$#i', $_POST['email']))
  {
    $errors['email'] = '<br>E-mail invalide ou vide';
  }
  else {
    
    $sql= "UPDATE users SET email = '".$_POST['email']."' WHERE id = '".$_SESSION['user']['id']."'";
    if ($mysqli->query($sql) === true) {
        redirectToRoute('/deconnexion.php');
    } else {
        echo 'Une erreur est survenue. Veuillez recommencer';

    }
  }
}

if (isset($_POST['token_password']) && $_POST['token_password'] === $_SESSION['token_password']) {

  

  if(isset($_POST['password']) && !empty($_POST['password']) && $_POST['password'] === $_POST['passwordConf'] )
  {
    
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql= "UPDATE users SET password = '".$password_hash."' WHERE id = '".$_SESSION['user']['id']."'";
    if ($mysqli->query($sql) === true) {
        redirectToRoute('/deconnexion.php');
    } else {
        echo 'Une erreur est survenue. Veuillez recommencer';

    }
  }
  else {
    $errors['passwordConf'] = '<br>Mot de passe invalide';
  }
  
}




if (isset($_POST['token_delete']) && $_POST['token_delete'] === $_SESSION['token_delete']) {

  

  

    $sql= "DELETE FROM users WHERE id = '".$_SESSION['user']['id']."'";
    if ($mysqli->query($sql) === true) {
        redirectToRoute('/deconnexion.php');
    } else {
        echo 'Une erreur est survenue. Veuillez recommencer';

    }
  
  
  
}


?>



<div class="m-a mt-5">
    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 m-auto pt-4">
        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
            Compte de <?= $_SESSION['user']['pseudo'];?>
        </p>



        <form class="m-4" method="post" >
            <input type="hidden" name="token_pseudo" value="<?= miniToken('token_pseudo'); ?>">


            <div class="d-flex flex-row align-items-center mb-3">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <p>Votre pseudo est <?= $_SESSION['user']['pseudo'];?> .</p>
                    <input type="pseudo" class="form-control" name="pseudo" id="pseudo" />
                    <label class="form-label" for="pseudo">Pseudo</label>
                    <p><?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?></p>


                </div>
            </div>
            <div class="d-flex justify-content-center ">
                <button type="submit" id="btnpseudo" class="btn btn-primary ">Changer de pseudo</button>
            </div>

        </form>







        <form class="m-4" method="post">
            <input type="hidden" name="token_email" value="<?= miniToken('token_email'); ?>">


            <div class="d-flex flex-row align-items-center ">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <p>Votre email est <?= $_SESSION['user']['email'];?>.</p>
                    <input type="email" class="form-control" name="email" id="email" />
                    <label class="form-label" for="email">Email</label>
                    <p><?= isset($errors['email']) ? $errors['email'] : ''; ?></p>


                </div>
            </div>
            <div class="d-flex justify-content-center m-4">
                <button type="submit" id="btnpseudo" class="btn btn-primary ">Changer d'email</button>
            </div>

        </form>





        <form class="m-4" method="post">
            <input type="hidden" name="token_password" value="<?= miniToken('token_password'); ?>">


            <div class="d-flex flex-row align-items-center mb-3">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill ">
                    <input type="password" class="form-control" name="password" id="password" />
                    <label class="form-label" for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="passwordConf" id="passwordConf" />
                    <label class="form-label" for="passwordConf">Confirmation du mot de passe</label>
                    <p><?= isset($errors['passwordConf']) ? $errors['passwordConf'] : ''; ?></p>


                </div>
            </div>
            <div class="d-flex justify-content-center m-4">
                <button type="submit" id="btnpseudo" class="btn btn-primary ">Changer de mot de passe</button>
            </div>

        </form>


        <form class="mt-5" method="post">

            <input type="hidden" name="token_delete" value="<?= miniToken('token_delete'); ?>">
            <div class="d-flex justify-content-center m-4">
                <button type="submit" id="submit" name="submit" class="btn btn-danger " onclick="return confirm('Etes vous sur de vouloir supprimer votre compte ?')">Supprimer le
                    compte</button>
            </div>

        </form>

        <div class="d-flex justify-content-center m-4">
            <a href="deconnexion.php" class="btn btn-primary">Deconnexion</a>
        </div>
    </div>
</div>
<?php  require_once 'asset/default_template/footer.php'; ?>