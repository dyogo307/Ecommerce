<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");

?>

<html>
	<head>
		<title> Kaus Store </title>
		
		<link rel="stylesheet" href="styles.css" media="all"/>
	<head/>

<body>
		<div class="main_wrapper">


			<div class="logo">
				<h1> kaus </h1>
			</div>

			<div class="menubar">
				<ul id="menu">
					<li> <a href="index.php">Home</a></li>
					<li> <a href="my_account.php">My Account</a></li>
					<li> <a href="#">Sign Up</a></li>
					<li> <a href="cart.php">Shopping Cart</a></li>					
				</ul>
				<ul id ="cats">
						
						<?php getCats(); ?>
				
			<div/>
			
			
			<div class="content_wrapper">			
							
				<form action="register.php" method="post" enctype="multipart/form-data">
				<table align="center" width="500" style="margin-top:100px; color:black;">

					<tr>
						<td><h2>Cria a tua Conta</h2></td>
					</tr>
					
						<tr>
						<td align="right">Email</td>
						<td><input type="text" name="email" required/></td>
						</tr>
						
						<tr>
						<td align="right">Password</td>
						<td><input type="password" name="pass" required/></td>
						</tr>


						<tr>
						<td align="right">Nome</td>
						<td><input type="text" name="name" required/></td>
						</tr>
																	
						<tr>
						<td align="right">Cidade</td>
						<td>
						<select name="city">
						<option> Seleciona a tua cidade</option>
						<option> Porto</option>
						<option> Lisboa</option>
						<option> Braga</option>
						<option> Guimarães</option>
						<option> Bragança</option>
						</select>
						</td>
						
						<tr>
						<td align="right">Contacto </td>
						<td><input type="text" name="contact" required/></td>
						</tr>
						
						<tr>
						<td><input type="submit" name="register" value="Create Account"/></td>
						</tr>
						</table>
				</form>
				
			</div>


			
			<div id="footer">
			</div>
		</div>
	</div>	

 
</body>
</html>


<?php
if(isset($_POST['register'])){
	
	$ip=getIP();
	$email= $_POST['email'];
	$pass= sha1($_POST['pass']);
	$name= $_POST['name'];
	$city= $_POST['city'];
	$contact= $_POST['contact'];

	$insert_u = "insert into users (user_email, user_pass,user_name, user_city, user_contact, user_ip) values ('$email','$pass','$name','$city','$contact','$ip')";
	$run_u = mysqli_query($con, $insert_u);
	
	$sell_cart ="select * from cart where ip_add=$'ip'";
	$run_cart=mysqli_query($con, $sell_cart);
	$check_cart= mysqli_num_rows($run_cart);
	if($check_cart==0){
		$_SESSION['user_email']=$email;
		echo "<script>alert('Conta criada com sucesso!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}
	else{
		$_SESSION['user_email']=$email;
		echo "<script>alert('Conta criada com sucesso!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
}
?>

