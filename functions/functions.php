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
   return unserialize($_COOKIE['cart'] ?? []);
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

    while ($product = mysqli_fetch_array($result)) {
        $product['quantity'] = $cart[$product['product_id']];

        $products[] = $product;
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

        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

    }
}

function getPro()
{

    if (!isset($_GET['cat'])) {

        global $con;

        $get_pro = "select * from products order by RAND() LIMIT 0,6";

        $run_pro = mysqli_query($con, $get_pro);

        while ($row_pro = mysqli_fetch_array($run_pro)) {

            $pro_id    = $row_pro['product_id'];
            $pro_cat   = $row_pro['product_cat'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_image = $row_pro['product_image'];


            echo "
			<div id='single_product'>
			
				<h3><b>$pro_title<b></h3>
				<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
				<p> $pro_price </p>
				<a href='details.php?pro_id=$pro_id' style='float:left; color:black; text-decoration:none; font-size: 15px;'>ver produto</a>
				<a href='index.php?add_cart=$pro_id'><button style='float:right; border-radius: 12px; background-color: #4CAF50; border: 1px solid green;'>Adicionar ao carrinho</button></a>			
			</div> ";
        }
    }

}

function getPro1()
{

    if (!isset($_GET['cat'])) {

        global $con;

        $get_pro = "select * from products order by RAND() LIMIT 0,3";

        $run_pro = mysqli_query($con, $get_pro);

        while ($row_pro = mysqli_fetch_array($run_pro)) {

            $pro_id    = $row_pro['product_id'];
            $pro_cat   = $row_pro['product_cat'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_image = $row_pro['product_image'];


            echo "
			<div id='single_product'>
			
				<h3>$pro_title</h3>
				<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
				<p> $pro_price </p>
				<a href='details.php?pro_id=$pro_id' style='float:left; color:black; text-decoration:none;'>ver produto</a>
				<a href='index.php?add_cart=$pro_id'><button style='float:right; border-radius: 12px; background-color: #4CAF50; border: 1px solid green;'>Adicionar ao carrinho</button></a>			
			</div> ";
        }
    }

}

function getCatPro()
{

    if (isset($_GET['cat'])) {

        $cat_id = $_GET['cat'];

        global $con;

        $get_cat_pro = "select*from products where product_cat='$cat_id'";

        $run_cat_pro = mysqli_query($con, $get_cat_pro);

        while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {

            $pro_id    = $row_cat_pro['product_id'];
            $pro_cat   = $row_cat_pro['product_cat'];
            $pro_title = $row_cat_pro['product_title'];
            $pro_price = $row_cat_pro['product_price'];
            $pro_image = $row_cat_pro['product_image'];


            echo "
			<div id='single_product'>
			
				<h3>$pro_title</h3>
				<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
				<p> Preço: $pro_price </p>
				<a href='details.php?pro_id=$pro_id' style='float:left; color:black; text-decoration:none;'>ver produto</a>
				<a href='index.php?pro_id=$pro_id'><button style='float:right; border-radius: 12px; background-color: #4CAF50; border: 1px solid green;'>Adicionar ao carrinho</button></a>
			
			</div>
		
		 ";
        }
    }

}

?>







