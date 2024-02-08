<?php
session_start();
include './partials/header.php';
require_once './config/connexion.php';

$preparedRequestPhotoFeed = $connexion->prepare(
    "SELECT photo.*, user.id AS user_id, user.username, user.profilephoto FROM photo INNER JOIN user ON user.id = photo.user_id ORDER BY photo.created_at DESC
    "
);

$preparedRequestPhotoFeed->execute();

$photofeed = $preparedRequestPhotoFeed->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="row">

    <?php
    include './partials/navbar.php';
    ?>

</div>

<div class="col-2 pt-4"></div>

<div class="col-4 pt-4">

    <?php



    foreach ($photofeed as $photofeed1) { 

//AFFICHER LE NOMBRE DE LIKES
$prepareRequest = $connexion->prepare('SELECT COUNT(*) FROM likes WHERE likes.post_id = ?');
$prepareRequest->execute([
    $photofeed1['id']
]);
$like = $prepareRequest->fetch();
?>

        <div class="card m-3" style="width: 30rem;">
            <h5 class="card-title"><img src="./images/uploads/<?= $photofeed1['profilephoto'] ?>" class="picc2 m-2"> <?= $photofeed1['username'] ?></h5>
            <img src="/images/uploads/<?= $photofeed1['photo'] ?> " style="width: 30rem;">

            <div class="card-body">
                <!-- LIKE -->
                <form action="./process/process_like.php" method="post">
                    <h5 class="card-title">
                        <input type="hidden" name="post_id" value="<?= $photofeed1['id'] ?>">
                        <button type="submit" class="btn" onclick="changeColor(this)"><i class="fa-regular fa-heart fa-lg me-2" "> <?= $like['0'] ?> </i></button>
                    </h5>
                </form>


                <p class="card-text"><?= $photofeed1['username'] . ":" . " " . $photofeed1['content'] ?></p>
            </div>
        </div>
    <?php
    } ?>

    <?php
    include './partials/footer.php';
    ?>

</div>

<div class="col-4 pt-4"> <a href="./profil.php" style="text-decoration:none" class="text-dark">

        <div class="row">

            <div class="col-5">
                <img src="./images/uploads/<?= $_SESSION['profilephoto'] ?>" alt="" srcset="" class="picc2 m-2"> <?= $_SESSION['username'] ?>
    </a>
</div>

<div class="col-7 pt-2">

    <a href="./process/process_logout.php" style="text-decoration:none" class="fw-semibold">Basculer</a>
</div>

<!-- la Modal (fenetre pop-up) -->

<div id="demo" class="modal">

    <?php
    include './partials/modal.php';
    ?>

</div>