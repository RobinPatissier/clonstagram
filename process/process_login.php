<?php
session_start();

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    require_once '../config/connexion.php';

    $preparedRequest = $connexion->prepare("SELECT * FROM user WHERE username = ?");
    $preparedRequest->execute([
        $_POST['username']
    ]);

    $user = $preparedRequest->fetch(PDO::FETCH_ASSOC);

    if (empty($user)) {
        header('Location: ../index.php?error=Utilisateur Inconnu');
        die;
    }

    $isverified = password_verify($_POST['password'], $user['password']);
    if ($isverified) {
        // Connect l'utilisateur
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user["username"];
        $_SESSION['profilephoto'] = $user['profilephoto'];

        setcookie('username', $_SESSION['username'], time()+3600, '/');
        header('Location: ../feed.php?success=tu es connecté');
        die;
    }else{
        // Tu t'es trompé dans le mot de passe
        header('Location: ../index.php?error=Password incorrect');
        die;
    }
}
