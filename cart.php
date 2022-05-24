<!DOCTYPE html>
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

        <link rel="stylesheet" href="style.css" media="all"/>
        <link rel="stylesheet" type="text/css"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <head/>

    <body>
        <div class="main_wrapper">
            <div class="logo">
                <h1> kaus </h1>
            </div>

            <?php include('./views/main-menu.php'); ?>

            <div class="content_wrapper">
                <div id="content_area">
                    <div id="products_box">
                        <br>
                        <form action="" method="post">
                            <table>
                                <tr align="center" style="margin-top:100px; margin-left:100px">
                                    <th>Remover</th>
                                    <th>Produtos</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                </tr>

                                <?php
                                    $total = 0;

                                    foreach (getCartProducts() as $product) {
                                        $total += $product['quantity'] * $product['product_price'];
                                ?>
                                    <tr>
                                        <td>
                                            <a href="./cart.php?remove_product=<?= $product['product_id']; ?>">Remover</a>
                                        </td>
                                        <td>
                                            <img src="admin_area/product_images/<?= $product['product_image']; ?>" width='180' height='180'>
                                        </td>
                                        <td>
                                            <input type="number" name="quantities[<?= $product['product_id'] ?>]"
                                                   min="1" value="<?= $product['quantity'] ?>">
                                        </td>
                                        <td><?= $product['product_price'] ?></td>
                                    </tr>
                                <?php } ?>

                                <tr>
                                    <td colspan="3"> Total</td>
                                    <td><?php echo $total; ?></td>
                                </tr>

                                <tr align="center">
                                    <td><input type="submit" name="update_cart" value="Update Cart"/></td>
                                    <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                                    <td>
                                        <button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a>
                                        </button>
                                    </td>
                                </tr>

                            </table>
                        </form>

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


                    </div>
                </div>
            </div>


    </body>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>A nossa Loja</h4>
                    <ul>
                        <li><a href="#">sssss</a></li>
                        <li><a href="#">sssss</a></li>
                        <li><a href="#">sssss</a></li>
                        <li><a href="contact_us.php">Contacta-nos</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Loja Online</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <?php getCats(); ?>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/UniversidadeLusiadaFamalicao"><i
                                    class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/ulusiadafam/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/diogo-cunha-105940220/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
    </footer>


</html>
