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
    </head>

    <body>
        <?php include('./views/navbar.php'); ?>

        <div class="container mt-5  p-5">
            <form action="" method="POST" class="row">
                <aside class="col-lg-8">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col" class="fit-content"></th>
                                        <th scope="col">Nome</th>
                                        <th scope="col" class="fit-content">Quantidade</th>
                                        <th scope="col" class="fit-content">Tamanho</th>
                                        <th scope="col" class="text-end">Preço</th>
                                        <th scope="col" class="fit-content"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach (getCartProducts() as $product) {
                                        $total += $product['quantity'] * $product['product_price'];
                                        ?>
                                        <tr>
                                            <td>
                                                <img src="admin_area/product_images/<?= $product['product_image']; ?>"
                                                     width='100' height='100'>
                                            </td>
                                            <td><?= $product['product_title'] ?></td>
                                            <td>
                                                <input class="form-control" type="number"
                                                       name="quantities[<?= $product['product_id'] ?>]"
                                                       min="1" value="<?= $product['quantity'] ?>">
                                            </td>
                                            <td>
                                            <select class="form-select " >
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            </select></td>
                                            <td class="text-end"><?= $product['product_price'] ?></td>
                                            <td>
                                                <a class="btn"
                                                   href="./cart.php?remove_product=<?= $product['product_id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </aside>

                <aside class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align">
                                <dt>Preço Total</dt>

                                <dd>$<?php echo $total; ?></dd>
                            </dl>

                            <hr>
                            <button type="submit" class="btn btn-primary" name="update_cart">Atualizar Carrinho</button>
                            <a href="payment.php" class="btn btn-out btn-success btn-square btn-main " data-abc="true">Pagamento</a>
                        </div>
                    </div>
                </aside>
            </form>
        </div>

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>

</html>
