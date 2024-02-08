<?php

session_start();
require_once './config/connexion.php';

$preparedRequestPhotosVisit = $connexion->prepare('SELECT * FROM user WHERE id = ? ');
$preparedRequestPhotosVisit->execute([
    $_GET['id']
]);
$visituser = $preparedRequestPhotosVisit->fetch(PDO::FETCH_ASSOC);


$preparedRequestPhotosVisit = $connexion->prepare('SELECT * FROM photo WHERE user_id = ?');
$preparedRequestPhotosVisit->execute([
    $_GET['id']
]);
$photovisit = $preparedRequestPhotosVisit->fetchAll(PDO::FETCH_ASSOC);

include './partials/header.php';
?>
<div class="row borderrow">

    <?php
    include './partials/navbar.php';

    ?>



<div class="col-2 pt-4">
</div>
<div class="col-6 pt-4">
    <div class="row">
        <div class="col-4 d-flex">
            <img src="./images/uploads/<?= $visituser["profilephoto"] ?>" alt="" srcset="" class="picc m-2">
        </div>
        <div class=" col-6 d-flex">
            <h5 class="card-title p-2"> <?= $visituser["username"] ?></h5>
        </div>
        <?php ?>


        <div class="container">
            <div class="row">
                <?php foreach ($photovisit as $photovisit1) : ?>
                    <div class="col-4 p-1">
                        <div class="card">
                            <img src="./images/uploads/<?= $photovisit1["photo"] ?>" class="custom-image" alt="Post Image">
                            <!-- Vous pouvez ajouter d'autres éléments ici pour afficher d'autres informations sur le post -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <!-- la Modal (fenetre pop-up) -->

        <div id="demo" class="modal">

            <?php
            include './partials/modal.php'
            ?>

        </div>
    </div>