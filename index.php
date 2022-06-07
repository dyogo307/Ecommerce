<?php
session_start();
include("functions/functions.php");

if (isset($_GET['add_cart'])) {
    addToCart($_GET['add_cart']);

    header('location:' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Kaus Store</title>
        <?php include('./views/structure/head.php'); ?>
    </head>

    <body>
        <?php include('./views/navbar.php'); ?>

        <div class="container my-5">
            <div class="row">
                <?php getPro(); ?>
            </div>
        </div>

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>
</html>
