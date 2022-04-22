<?php

$con = mysqli_connect("localhost","root","","ecommerce");

//------------Categorias-------------------

function getCats(){

	global $con;
	
	$get_cats = "select * from categories";
	
	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats=mysqli_fetch_array($run_cats)){
		
			$cat_id = $row_cats['cat_id'];
			$cat_title = $row_cats['cat_title'];
			
	echo "<li><a href='#'> $cat_title</a></li>";		
	
		
}	
}

function getPro(){
	
	global $con;
	
	$get_pro = "select*from products order by RAND() LIMIT 0,6";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		
		echo "
			<div id='single_product'>
			
				<h3>$pro_title</h3>
				<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
				<p> $ $pro_price </p>
				<a href='details.php' style='float:left;'>Details</a>
				<a href='index.php'><button style='float:right'>Add to Cart</button></a>
			
			</div>
		
		 ";
	}
	}	

?>