<?php
include("functions/functions.php");

session_start();

if (isset($_GET['remove_product'])) {
    removeProductFromCart($_GET['remove_product']);

    header('location: ./cart.php');
    exit();
}
 
if (isset($_POST['update_cart'])) {
    updateProductsQuantities($_POST['quantities'] ?? []);

    header('location: ./cart.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title> Kaus Store </title>
        <?php include('./views/structure/head.php'); ?>
    <head/>

    <body>
        <?php include('./views/navbar.php'); ?>	
		
		
		<div class="container mt-5  p-5">
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Produtos</th>
                                    <th scope="col" >Quantidade</th>
                                    <th scope="col" >Preço</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
							   </tr>									
                            <tbody>
                                <?php
                                    $total = 0;

                                    foreach (getCartProducts() as $product) {
                                        $total += $product['quantity'] * $product['product_price'];
                                ?>
										<tr>
                                        <td>
                                            <img src="admin_area/product_images/<?= $product['product_image']; ?>" width='100' height='100'>
                                        </td>
                                        <td>
                                            <input type="number" name="quantities[<?= $product['product_id'] ?>]"
                                                   min="1" value="<?= $product['quantity'] ?>">
                                        </td>
                                        <td><?= $product['product_price'] ?></td>
										
                                        <td>
                                            <a href="./cart.php?remove_product=<?= $product['product_id']; ?>" style="text-decoration:none; color:red;" align="center";>Remover </a>
                                        </td>

                                    </tr>
								<?php } ?>
                            </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">

                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Preço Total</dt>
                            <dd class="text-right ml-3">$<?php echo $total; ?></dd>
                        </dl>
				
                        <hr> <button type="submit" class="btn btn-primary" name="updatecart">Atualizar Carrinho</button> <a href="payment.php" class="btn btn-out btn-success btn-square btn-main " data-abc="true">Pagamento</a>
                    </div>
                </div>
				
            </aside>
			
        </div>
		
    </div>
						<?php
                        function updatecart()
                        {
                            global $con;
                            $ip = getIp();

                            if (isset($_POST['update_cart'])) {
                                foreach ($_POST['remove'] as $remove_id) {
                                    $delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
                                    $run_delete     = mysqli_query($con, $delete_product);

                                    if ($run_delete) {
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }
                                }
                            }
                            if (isset($_POST['continue'])) {
                                echo "<script>window.open('index.php','_self)</script>";
                            }
                            echo @$up_cart = updatecart();
                        }

                        ?>
		

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>

</html>
