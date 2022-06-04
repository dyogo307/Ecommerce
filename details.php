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

        <div class="container my-5">
            <h2 class="mb-4">Detalhes de Produto</h2>

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
            <div class="col-md-6 col-lg-4">
                <div class="mb-3 mb-md-4 mb-lg-5">
                    <h3>' . $pro_title . '</h3>
                    
                    <div class="mb-3">
                        <img class="img-thumbnail" src="admin_area/product_images/' . $pro_image . '">
                    </div>
                    
                    <p class="lead">' . $pro_price . '€</p>
                    
                    
                    <a class="btn btn-primary btn-sm" href="details.php?pro_id=' . $pro_id . '">
                        <i class="fas fa-eye"></i> Ver produto
                    </a>
                    
                    <a class="btn btn-secondary btn-sm" href="index.php?add_cart=' . $pro_id . '">
                        <i class="fas fa-cart-plus"></i> Adicionar ao carrinho
                    </a>
                </div>			
            </div>';
	
			
		
                   
                }
            }
            ?>
        </div>

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>
</html>
