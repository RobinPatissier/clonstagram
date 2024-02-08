<?php
session_start();
date_default_timezone_set('Europe/Paris');
 
require_once '../config/connexion.php';

$uploads = "../images/uploads";
$tmp_name = $_FILES['profilephoto']['tmp_name'];
$name = $_FILES['profilephoto']['name'];
$addpict = move_uploaded_file($tmp_name, $uploads . '/' .$name );
$_SESSION['profilephoto'] = $name;
$imagebase = "baseprofilepic.jpeg";

$preparedRequest = $connexion->prepare(
    "SELECT * FROM user
    WHERE username =  ?"
);


$preparedRequest->execute([
            $_POST["username"],
        ]);
$verifyUser = $preparedRequest->fetch(PDO::FETCH_ASSOC);



if (!empty($_POST['username'])
    && !empty($_POST['password'])
    && !$verifyUser ) {
        

        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $preparedRequestCreateUser = $connexion->prepare(
            "INSERT INTO user (`username`, `password`, `datetime`, `profilephoto`) VALUES (?,?,?,?)"
        );
        // Execute la requete pour inserer le user 
        $preparedRequestCreateUser->execute([
            $_POST["username"],
            $hashed_password,
            date("d-m-y h:i:s"),
            empty($name) ?  $imagebase : $name
        ]);


        $_SESSION['id'] = $connexion->lastInsertId();
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['profilephoto'] = empty($name) ?  $imagebase : $name; 

         header('Location: ../feed.php?success=Votre compte a bien été créé !');
}else if ($verifyUser){
    header('Location: ../index.php?error=Deja inscrit !');
}
else{
    header('Location: ../index.php?error=Erreur dans la création du compte');

}