<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Kaus Store</title>
        <?php include('./views/structure/head.php'); ?>
    </head>

    <body>
        <?php include('./views/navbar.php'); ?>

        <div class="card bg-dark text-black">
            <img src="images/fundo.jpg" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h1 class="text-center" style="">Kaus</h1>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <?php getPro(true); ?>
            </div>
        </div>


        <div class="container py-5">
            <div class="card bg-dark text-white">
                <img src="images/kaws.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">

                </div>
            </div>
        </div>

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>
</html>
