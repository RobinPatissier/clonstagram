<?php
session_start();
include './partials/header.php'
?>

<div class="row">
    
<?php
include './partials/navbar.php';
?>



<div class="col-2 pt-4"></div>

    <div class="col-4 pt-4">
        <div class="row borderrow">
            <div>
            <img src="./images/uploads/<?=$_SESSION['profilephoto'] ?>" alt="" srcset="" class="picc3 m-2"> <a style="text-decoration:none" class="promodif"><?= $_SESSION['username'] ?></a>

<form class="formupdate" action="./process/process_addphoto.php" method="post" enctype="multipart/form-data"> 
    <input class="inputupdate" type="file" id="profilephoto" name="profilephoto">
    <button class="buttonupdate btn btn-dark" type="submit">Envoyer</button>
</form>
</div>



</div>