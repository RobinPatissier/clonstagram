<?php

session_start();
date_default_timezone_set('Europe/Paris');
require_once '../config/connexion.php';


$uploads = "../images/uploads";
$tmp_name = $_FILES['photofeed']['tmp_name'];
$name = $_FILES['photofeed']['name'];
$addpict = move_uploaded_file($tmp_name, $uploads . '/' .$name );
$_SESSION['photofeed'] = $name;
$user_id = $_SESSION['id'];


if(!empty ($name) && !empty($_POST['content'])){


$preparedRequestAddphotofeed = $connexion->prepare( 
    "INSERT INTO photo (`user_id`, `photo`, `created_at`, `content`) VALUES (?, ?, ?, ?)"
);

$preparedRequestAddphotofeed->execute([
    $user_id,
    $name,

    date("d-m-y H:i:s"),

    $_POST['content']

]);

header('Location: ../feed.php');

}else{
    header('Location: ../feed.php?error=Photo ou description manquante');
}