<?php

session_start();
date_default_timezone_set('Europe/Paris');
require_once './config/connexion.php';

include './partials/header.php';
require_once './config/connexion.php';
?>
<div class="row borderrow">

    <?php
    include './partials/navbar.php';

    $preparedRequestPost = $connexion->prepare('SELECT * FROM `photo` WHERE user_id = ? ORDER BY created_at DESC');
    $preparedRequestPost->execute([
        $_SESSION['id']
    ]);
    $post = $preparedRequestPost->fetchAll(PDO::FETCH_ASSOC);

    ?>

<div class="col-2 pt-4">
</div>
<div class="col-6 pt-4">
    <div class="row">
        <div class="col-4 d-flex">
            <img src="./images/uploads/<?= $_SESSION['profilephoto'] ?>" alt="" srcset="" class="picc m-2">
        </div>
        <div class=" col-6 d-flex">
            <h5 class="card-title p-2"><?= $_SESSION['username']; ?></h5>
            <a href="./update_profile.php"> <button type="submit" class="btn btn-dark p-2">Modifier photo profil</button> </a>
        </div>
        <?php ?>

     

<div class="container pt-5">
    <div class="row">
        <?php foreach ($post as $post1) : ?>
            <div class="col-4 p-1">
                <div class="card">
                    <img src="./images/uploads/<?= $post1['photo'] ?>" class="custom-image" alt="Post Image">
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