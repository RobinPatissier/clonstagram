<?php
include './partials/header.php'

?>

<div class="row d-flex justify-content-end m-5">

    <div class="col-6">

            <h3 class="fs-3 d-flex justify-content-end m-2">
                <img src="./images/telacceuil.png" alt="" srcset="" width="400px">


    </div>


    <div class="col-6 d-flex justify-content-start ">
        
        

        <form action="./process/process_login.php" method="post">
            <img src="./images/logotext.png" alt="" srcset="" width="400px">
            <h2 class="d-flex justify-content-center">LOG IN </h2>
                <input class="rounded form-control form-control-lg mt-3 p-2" name="username" type="text" placeholder="Username">

                <input class="rounded form-control form-control-lg mt-3 p-2" name="password" type="password" placeholder="Password">

                <div class="d-flex justify-content-center m-2">

                <button type="submit" class="btn btn-primary ">Se Connecter</button>
            </div>
            <h4 class="d-flex justify-content-center m-2">ou &nbsp;<a href="register.php">s'inscrire</a></h4>
        </form>
    </div>
</div>



<div class="">
<?php

include './partials/footer.php'

?>
</div>
