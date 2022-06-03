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
            <h2 class="mb-4">Título da página</h2>

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


                    echo "
			<div id='single_product'>
			
				<h3><b>$pro_title<b></h3>
				<img src='admin_area/product_images/$pro_image' width='400' height='300'/>
				<p> $pro_price </p>
				<p> $pro_desc</p>
				<a href='index.php' style='float:left; color:blue;'>Go Back</a>
				<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
			
			</div>
		
		 ";
                }
            }
            ?>
        </div>

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>
</html>
