<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Kaus Store</title>
        <?php include('./views/structure/head.php'); ?>
    </head>

    <body>
        <?php include('./views/navbar.php'); ?>

        
        <?php
            if(isset($_GET['pro_id'])){

                $product_id = $_GET['pro_id'];

                $get_pro = "select * from products where product_id='$product_id'";

                $run_pro = mysqli_query($con, $get_pro);

                while($row_pro=mysqli_fetch_array($run_pro)){

                    $pro_id = $row_pro['product_id'];
                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['product_price'];
                    $pro_image = $row_pro['product_image'];
                    $pro_desc = $row_pro['product_desc'];

			echo '
            <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img class="img-thumbnail" src="admin_area/product_images/' . $pro_image . '"></div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="product p-4">
                            <div class="mt-4 mb-3"> 
                                <h5 class="text-uppercase"><h3>' . $pro_title . '</h3></h5>
                                <div class="price d-flex flex-row align-items-center">  <p class="lead">' . $pro_price . '€</p></div>
                            </div>
                            <p class="about"><p class="lead">' . $pro_desc . '</p>
                            <a class="btn btn-secondary btn-sm" href="index.php?add_cart=' . $pro_id . '">
                            <i class="fas fa-cart-plus"></i> Adicionar ao carrinho    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
	           
                   
                }
            }
            ?>
        



        

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>
</html>
