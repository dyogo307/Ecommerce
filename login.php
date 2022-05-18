<?php
include("includes/db.php");
include("functions/functions.php");

?>
<html>
	<head>
		<title> Kaus Store </title>
		
		<link rel="stylesheet" href="style.css" media="all"/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<head/>

<body>
		<div class="main_wrapper">

			<div class="logo">
				<h1> kaus </h1>
			</div>

			<div class="menubar">
				<ul id="menu">
					<li> <a href="home.php">Home</a></li>
					<li> <a href="my_account.php">My Account</a></li>
					<li> <a href="login.php">Sign Up</a></li>
					<li> <a href="cart.php">Shopping Cart</a></li>		
										
					<?php 
					if(!isset($_SESSION['user_email'])){
						echo "<a href='checkout.php'>Login</a>";
						}
						else{
							echo "<a href='logout.php'>Logout</a>";
						}
					?>	
				</ul>
				<ul id ="cats">
						
						<?php getCats(); ?>
						
				</ul>
			<div/>

<div>

	<form method="post" action="post">
	
		<table width="500" align="center" border="5" style="margin-top:100px; margin-left:300px">
		
		<tr >
			<td align="center" >Email:</td>
			<td><input type="text" name="email" placeholder="insere email" required/></td>
		</tr>
		
		<tr>
			<td align="center">Password:</td>
			<td><input type="password" name="pass" placeholder="insere password" required/></td>
		</tr>
		
		
		<tr align ="center">
			<td colspan="4"><input type="submit" name="login" placeholder="Login"/></td>
		</tr>
		</table>
		<h2 style="float:right; padding:5px;"><a href="register.php" style="text-decoration:none; color:black;">Regista-te Aqui</a></h2>

</div>

<?php
if(isset($_POST['login'])){
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$sel_u= "select * from users where user_email='$email' AND user_pass='$pass'";
	$run_u= mysqli_query($con,$sel_u);
	$check_user = mysqli_num_rows($run_u);
	
	if($check_user==0){
		echo"<script>alert('Palavra-passe ou email incorreto')</script>";
		exit();
}
	$ip=getIp();
	$sell_cart ="select * from cart where ip_add=$'ip'";
	$run_cart=mysqli_query($con, $sell_cart);
	$check_cart= mysqli_num_rows($run_cart);
	
	if($check_user>0 AND $check_cart==0){
		$_SESSION['user_email']=$email;
		
		echo "<script>alert('Login bem sucedido')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}
	else{
		$_SESSION['user_email']=$email;
		
		echo "<script>alert('Login bem sucedido')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
}
?>
</body>
			
			<footer class="footer" style="margin-top:400px;">
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
					<li> <a href="index.php">Home</a></li>
					<?php getCats(); ?>
  	 			</ul>
  	 		</div>
			<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="https://www.facebook.com/UniversidadeLusiadaFamalicao"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="https://www.instagram.com/ulusiadafam/"><i class="fab fa-instagram"></i></a>
  	 				<a href="https://www.linkedin.com/in/diogo-cunha-105940220/"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  </footer>
	</html>