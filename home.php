<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title> Kaus Store </title>
		        <link rel="stylesheet" href="styles/style.css" media="all"/>
        <link rel="stylesheet" type="text/css" />
			<?php include('./views/structure/head.php'); ?>
			
			<?php include('./views/navbar.php'); ?>

        
               <div class="card bg-dark text-black">
  <img src="images/fundo.jpg" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h1 class="text-center" style="">Kaus</h1>

  </div>
</div>
    </head>

    <body>
	<div class="content_wrapper">

                <div id="content_area">

                    <div id="products_box" >
                        <?php getPro(); ?> 
                    </div>
                </div>
    </div>
        


	<div class="container py-5">	
		 <div class="card bg-dark text-white">
  <img src="images/kaws.jpg" class="card-img" alt="...">
  <div class="card-img-overlay">

  </div>
</div>
        

          <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
 </div>
    </body>
</html>
