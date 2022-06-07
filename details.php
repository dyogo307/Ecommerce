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
			
			<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="https://i.imgur.com/Dhebu4F.jpg" width="250" /> </div>                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
                                <h5 class="text-uppercase">Mens slim fit t-shirt</h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">$20</span>
                                    <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div>
                                </div>
                            </div>
                            <p class="about">Shop from a wide range of t-shirt from orianz. Pefect for your everyday use, you could pair it with a stylish pair of jeans or trousers complete the look.</p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                            </div>
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
			
			
			
			
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
