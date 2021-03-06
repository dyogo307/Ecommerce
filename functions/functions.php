<?php

$con = mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno()) {
    echo "Conecção não estabelecida" . mysqli_connect_error();
}

function getIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}


function getCart()
{
    return isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : [];
}

function removeProductFromCart($productId)
{
    $cart = getCart();

    if (isset($cart[$productId])) {
        unset($cart[$productId]);
    }

    setcookie('cart', serialize($cart), time() + 3600);
}

function updateProductsQuantities($quantities)
{
    setcookie('cart', serialize($quantities), time() + 3600);
}

function getCartProducts()
{
    $cart = getCart();

    $productIds = implode(',', array_keys($cart));

    global $con;

    $sql    = "SELECT * FROM products where product_id IN (" . $productIds . ");";
    $result = mysqli_query($con, $sql);

    $products = [];

    if ($result) {
        while ($product = mysqli_fetch_array($result)) {
            $product['quantity'] = $cart[$product['product_id']];

            $products[] = $product;
        }
    }

    return $products;
}

function addToCart($productId)
{
    $cart = getCart();

    if (!isset($cart[$productId])) {
        $cart[$productId] = 1;
    } else {
        $cart[$productId]++;
    }

    setcookie('cart', serialize($cart), time() + 3600);
}

function cart()
{
    if (isset($_GET['add_cart'])) {

        global $con;

        $ip        = getIP();
        $pro_id    = $_GET['add_cart'];
        $check_pro = "select * from cart where ip_add ='$ip' AND p_id='$pro_id'";

        $run_check = mysqli_query($con, $check_pro);

        if (mysqli_num_rows($run_check) > 0) {
            echo "";
        } else {
            $insert_pro = "insert into cart(p_id,ip_add) values ('$pro_id','$ip')";
            $run_pro    = mysqli_query($con, $insert_pro);

            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

function total_items()
{

    if (isset($_GET['add_cart'])) {
        global $con;
        $ip          = getIP();
        $get_items   = "select * from cart where ip_add='$ip'";
        $run_items   = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    } else {
        global $con;
        $ip          = getIP();
        $get_items   = "select * from cart where ip_add='$ip'";
        $run_items   = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
}

function total_price()
{
    $total = 0;
    global $con;
    $ip         = getIP();
    $sell_price = "select * from cart where ip_add='$ip'";
    $run_price  = mysqli_query($con, $sell_price);

    while ($p_price = mysqli_fetch_array($run_price)) {
        $pro_id    = $p_price['p_id'];
        $pro_price = "select * from products where product_id='$pro_id'";

        $run_pro_price = mysqli_query($con, $pro_price);

        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
            $product_price = array($pp_price['product_price']);
            $values        = array_sum($product_price);
            $total         += $values;

        }
    }
    echo $total;

}


//------------Categorias-------------------


function getCats()
{

    global $con;

    $get_cats = "select * from categories";

    $run_cats = mysqli_query($con, $get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)) {

        $cat_id    = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];


        echo '<li class="nav-item"><a class="nav-link" href="index.php?cat=' . $cat_id . '">' . $cat_title . '</a></li>';
    }
}

function getPro($highlight = '%')
{
    global $con;

    $categoryId = $_GET['cat'] ?? '%';

    $get_pro = "select * from products where product_cat LIKE '$categoryId' AND highlight LIKE '$highlight'";

    $run_pro = mysqli_query($con, $get_pro);

    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $pro_id    = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];


        echo '
            <div class="col-md-6 col-lg-4">
                <div class="mb-3 mb-md-4 mb-lg-5">
                    <h3>' . $pro_title . '</h3>
                    
                    <div class="mb-3 ">
                        <img class="img-thumbnail rounded " style=" height: 350px; width: 350px;" src="admin_area/product_images/' . $pro_image . '">
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

function getProEX($Exclusive = '%')
{
    global $con;

    $categoryId = $_GET['cat'] ?? '%';

    $get_pro = "select * from products where product_cat LIKE '$categoryId' AND Exclusive LIKE '$Exclusive'";

    $run_pro = mysqli_query($con, $get_pro);

    while ($row_proex = mysqli_fetch_array($run_pro)) {

        $pro_id    = $row_proex['product_id'];
        $pro_title = $row_proex['product_title'];
        $pro_price = $row_proex['product_price'];
        $pro_image = $row_proex['product_image'];


        echo '
            <div class="col-md-6 col-lg-4">
               
                    <a class="btn btn-secondary btn-xxl " href="index.php?add_cart=' . $pro_id . '">
                        <i class="fas fa-cart-plus"></i> Adicionar ao carrinho
                    </a>
                </div>			
            </div>';
    }
}
?>







