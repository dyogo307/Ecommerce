<?php
session_start();
include("functions/functions.php");

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>DStore Store</title>
        <?php include('./views/structure/head.php'); ?>
    </head>

    <body>
        <?php include('./views/navbar.php'); ?>

        <div class="container py-5">
        <div class="card bg-dark text-black">
            <img src="images/fundo.jpg" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h1 class="text-center" style="">DStore</h1>
            </div>
        </div>
</div>
        <h1 class="mt-5" h1>
        <h2 class="mb-4 bg-dark text-light text-center">Destaques</h2>
        <div class="container my-5">
            <div class="row">
                <?php getPro(true); ?>
            </div>
        </div>

        <h1 class="mt-5" >
        <h2 class="mb-4 bg-dark text-light text-center">Produto Exclusivo</h2>
        <div class="container py-5" style="width: 75rem;">
            <div class="card bg-dark text-white">
                <img src="admin_area/product_images/KAW.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                <h1 class="text-center" style="">Figura Kaws mês de Julho</h1>
                <h1 class="text-center fs-4 text align-baseline" style="">999$</h1>
               
                </div>
                
            </div>
            <div class="row text-center-bottom ">
                    <?php getProEX(true); ?>
                </div>  
      
        </div>

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>
</html>
