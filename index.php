<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");

if (isset($_GET['add_cart'])) {
    addToCart($_GET['add_cart']);

    header('location:' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title> Kaus Store </title>
		        <link rel="stylesheet" href="styles/style.css" media="all"/>
        <link rel="stylesheet" type="text/css">
			<?php include('./views/structure/head.php'); ?>
			
			<?php include('./views/navbar.php'); ?>

    </head>

    <body>

	<div class="content_wrapper">

                <div id="content_area">

                    <div id="products_box">
                        <?php getPro(); ?>
                    </div>
                </div>
    </div>
        
      

          <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
 </div>

 </body>
</html>
