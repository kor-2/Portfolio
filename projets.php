<?php

require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'asset/default_template/header.php';

$errors = [];

$sqlprojet =
'SELECT p.projet_id, p.titre, p.content, p.image, p.creation, p.slug, p.statut, u.user_id, u.pseudo
FROM projets AS p
INNER JOIN users AS u
ON p.auteur = u.user_id
WHERE p.statut = 1 ORDER BY p.creation  DESC LIMIT 6 ';

$result = $mysqli->query($sqlprojet);
$projets = $result->fetch_All(MYSQLI_ASSOC);

foreach ($projets as $projet):
    dump($projet);

    $sqlcomment =
        "SELECT c.commentaire_id, c.user, c.projet, c.comment, u.user_id, u.pseudo
        FROM commentaires AS c
        INNER JOIN users AS u
        ON u.user_id = c.user
        WHERE c.projet = '".$projet['projet_id']."'
        ";
    $result = $mysqli->query($sqlcomment);
    $comments = $result->fetch_All(MYSQLI_ASSOC);

    foreach ($comments as $comment) :
        if (!empty($comment)) {
            dump($comment);
        } else {
            $errors['com'] = 'Pas de commentaires';
        }
    endforeach;
endforeach;

?>

<main class="p-5">

    <div class="text-center m-3">
        <h1>Projet: <?= $projet['titre']; ?></h1>
        <img src="<?= $projet['image']; ?>" alt="<?= $projet['slug']; ?>" class="img-fluid">
        <br><small>Date de création: <?= $projet['creation']; ?></small>

        <p><?= $projet['content']; ?></p>
        <small>Auteur: <?= $projet['pseudo']; ?></small>
    </div>
    

    <div>
        <h1>Commentaires: </h1>

        <p><?= $comment['comment']; ?></p>
        <small>Auteur: <?= $projet['pseudo']; ?></small>
        <div class="dark-blue-line m-auto"></div>


    </div>
        








</main>


<?php require_once 'asset/default_template/footer.php'; ?>