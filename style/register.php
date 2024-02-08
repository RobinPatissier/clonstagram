
<?php
include './partials/header.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>



<section class="container border border-light col mx-5 p-5 rounded-5 blur">
                <h1>Créer un compte</h1>
                <form action="./process/process_register.php" method="post" enctype="multipart/form-data">
                     <div class="mb-3">
                        <label for="username" class="form-label">Identifiant</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>
                   <div class="m-3">
                   <label for="photoprofile" class="form-label">Photo de profile (optionelle)</label>
                    <input type="file" id="profilephoto" name="profilephoto">
                    </div>
                    <a href=""> <button type="submit" class="btn btn-dark m-3">Créer un compte</button> </a>
                    
                </form>
            </section>
