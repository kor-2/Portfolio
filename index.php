<?php

require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'asset/default_template/header.php';




$sqlprojet =
"SELECT p.projet_id, p.titre, p.content, p.image, p.creation, p.slug, p.statut, u.user_id, u.pseudo
FROM projets AS p
INNER JOIN users AS u
ON p.auteur = u.user_id
WHERE p.statut = 1 ORDER BY p.creation  DESC LIMIT 6 ";

$result = $mysqli->query($sqlprojet);
$projets = $result->fetch_All(MYSQLI_ASSOC);



?>
<header class="bg-header py-5">
    <div class="text-center text-light">
        <img src="asset/img/#" alt="photo corentin heckmann" class="img-responsive" />
        <h1 class="font-weight-bold">HECKMANN CORENTIN</h1>

        <div class="white-line m-auto"></div>
        <p>Devloppeur Web</p>
    </div>
</header>




<main class="mt-5">

    <div class="text-center mb-5" id="portfolio">
        <h2 class="font-weight-bold text-dark-blue ">PORTFOLIO</h2>
        <div class="dark-blue-line m-auto"></div>
    </div>


    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3   m-3">

        <?php foreach ($projets as $projet):?>

        <div class="col ">
            <div class="card ">
                <img src="<?= $projet['image'];?>" class="card-img-top" alt="<?= $projet['slug'];?>" />
                <div class="card-body">
                    <h5 class="card-title"><?= $projet['titre'];?></h5>
                    <p class="card-text"><?= $projet['content'],'<br>Auteur: ',$projet['pseudo'];?></p>
                    <a href="https://github.com/kor-2" class="btn btn-projets">Github</a>
                    <button type="button" class="btn btn-projets" data-toggle="modal"
                        data-target="#staticBackdrop-<?= $projet['slug'];?>">Commentaires</button>

                </div>
            </div>
        </div>

        <!--Modal-->

        <?php 

        $sqlcomment = 
        "SELECT c.commentaire_id, c.user, c.projet, c.comment, u.user_id, u.pseudo
        FROM commentaires AS c
        INNER JOIN users AS u
        ON u.user_id = c.user
        WHERE c.projet = '".$projet['projet_id']."'";
        $result = $mysqli->query($sqlcomment);
        $comments = $result->fetch_All(MYSQLI_ASSOC);

        
        
        ?>


        <div class="modal fade" id="staticBackdrop-<?= $projet['slug'];?>" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Commentaires</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">

                        <?php foreach ($comments as $comment):?>

                        <p><?= $comment['comment'],'<br>',
                            'Auteur: ', $comment['pseudo'];?></p>

                        <?php endforeach;?>

                        <?php 
                        
                        if (isset($_SESSION['user'])) { 

                            $sql = "INSERT INTO commentaires(user, projet, comment)VALUE ('".$_SESSION['user']['id']."', '".$projet['id']."', '".$_POST['message']."')";
                            if ($mysqli->query($sql) === true)
                            {
                              redirectToRoute('/');
                            } else {
                              echo 'Erreur lors de l\'envoi !';
                            }





                            
                        ?>





                        <form method="post"><br>
                            <input type="hidden" name="token" value="<?= miniToken('token_commentaire'); ?>">
                            <label for="message">Votre commentaire</label><br>
                            <textarea class="form-control" type="text" id="message"></textarea><br>
                            <button type="submit" class="btn btn-projets">Envoyer</button>
                        </form>

                        <?php 
                        }
                        else{
                            echo '<a href="/login.php">Veulliez vous identifier pour commenter !</a>';
                        }
                        ?>



                    </div>

                </div>
            </div>
        </div>

        <?php endforeach;?>

    </div>














    <div class="text-center bg-header py-5 px-2 text-light" id="info">
        <h2 class="font-weight-bold">INFO</h2>
        <div class="white-line m-auto"></div>
        <p class="mt-3">
            info de moi info de moiinfo de moiinfo de moiinfo de moiinfo de moiinfo de moiinfo de moiinfo de moiinfo de
            moiinfo de moiinfo de moiinfo de moiinfo de moiinfo de moi
            info de moiinfo de moiinfo de moiinfo de moiinfo de moiinfo de moi
        </p>
        <button type="button" class="btn btn-outline-light" href="asset/pdf/#">Mon CV PDF</button>
    </div>

    <div class="row justify-content-center m-0">

        <div class="col-lg-8 col-xl-7 mx-3">

            <h2 class="font-weight-bold text-center mt-4" id="contact">CONTACT</h2>
            <div class="dark-blue-line m-auto"></div>
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">

                <div class="form-floating mt-5">
                    <input class="form-control" id="name" type="text" placeholder="Entrer votre nom ...." />
                    <label for="name">Nom complet</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="email" type="email" placeholder="adresse@example.com" />
                    <label for="email">Adresse email</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="sujet" type="text" placeholder="Votre sujet..." />
                    <label for="sujet">Sujet</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" id="message" type="text" placeholder="Votre message ..."
                        style="height: 10rem"></textarea>
                    <label for="message">Message</label><br>
                </div>
                <div class="text-center">
                    <button class="btn btn-projets btn-xl " id="submitButton" type="submit">Envoyer</button>
                </div>

            </form>
        </div>
    </div>

</main>

<?php  require_once 'asset/default_template/footer.php'; ?>