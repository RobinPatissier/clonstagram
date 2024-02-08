<?php

session_start();
require_once '../config/connexion.php';

$uploads = "../images/uploads";
$tmp_name = $_FILES['profilephoto']['tmp_name'];
$name = $_FILES['profilephoto']['name'];
$addpict = move_uploaded_file($tmp_name, $uploads . '/' .$name );
$_SESSION['profilephoto'] = $name;





$_FILES['profilephoto']['name'] ?? null ; 



$preparedRequestUpdateUser = $connexion->prepare(
    "UPDATE user SET profilephoto = ? WHERE id = ?"
);
// Execute la requete pour inserer le user 
$preparedRequestUpdateUser->execute([
    $name ?? null,
    $_SESSION['id']
]);

header('Location: ../profil.php');
